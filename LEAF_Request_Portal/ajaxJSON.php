<?php
/*
 * As a work of the United States government, this project is in the public domain within the United States.
 */

/*
    JSON index for legacy API
    Date Created: August 13, 2009

*/

error_reporting(E_ALL & ~E_NOTICE);

include 'Login.php';
include 'db_mysql.php';
include 'db_config.php';

$db_config = new DB_Config();
$config = new Config();

// Enforce HTTPS
if (isset($config->enforceHTTPS) && $config->enforceHTTPS == true)
{
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
    {
        header('Location: https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
        exit();
    }
}

$db = new DB($db_config->dbHost, $db_config->dbUser, $db_config->dbPass, $db_config->dbName);
$db_phonebook = new DB($config->phonedbHost, $config->phonedbUser, $config->phonedbPass, $config->phonedbName);
unset($db_config);

$login = new Login($db_phonebook, $db);

$login->loginUser();

$action = isset($_GET['a']) ? $_GET['a'] : '';

switch ($action) {
    case 'getform':
        require 'form.php';
        $form = new Form($db, $login);
        header('Content-type: application/json');
        echo $form->getFormJSON($_GET['recordID']);

        break;
    case 'getprogress': // support legacy customizations
          require 'form.php';
           $form = new Form($db, $login);
           header('Content-type: application/json');
           echo $form->getProgressJSON($_GET['recordID']);

           break;
    case 'getrecentactions':
        if (!is_numeric($_GET['lastStatusTime']))
        {
            exit();
        }
        $vars = array(':lastStatusTime' => $_GET['lastStatusTime']);
        $res = $db->prepared_query('SELECT recordID FROM action_history
        								WHERE time > :lastStatusTime
        								GROUP BY recordID', $vars);
        echo json_encode($res);

        break;
    case 'getlastaction':
        if (!is_numeric($_GET['recordID']))
        {
            exit();
        }
        $vars = array(':recordID' => $_GET['recordID']);
        $res = $db->prepared_query('SELECT * FROM records_dependencies
    									LEFT JOIN category_count USING (recordID)
    									LEFT JOIN categories USING (categoryID)
    									LEFT JOIN step_dependencies USING (dependencyID)
    									LEFT JOIN workflow_routes USING (workflowID, stepID)
    									LEFT JOIN workflow_steps USING (workflowID, stepID)
    									LEFT JOIN actions USING (actionType)
    									LEFT JOIN dependencies USING (dependencyID)
    									RIGHT JOIN action_history USING (recordID, dependencyID, actionType)
    									WHERE records_dependencies.recordID=:recordID
    										AND actionType IS NOT NULL
    									ORDER BY actionID DESC
    									LIMIT 1', $vars);
        echo json_encode($res[0]);

        break;
    case 'getextrainboxdata':
        require_once 'form.php';
        require_once 'Inbox.php';
        $form = new Form($db, $login);
        $inbox = new Inbox($db, $login);

        $inboxData = $inbox->getInbox($_GET['depID']);

        echo json_encode($form->getCustomData($inboxData[$_GET['depID']]['records'], $config->descriptionID));

        break;
    default:
        break;
}
