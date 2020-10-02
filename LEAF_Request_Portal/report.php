<?php
/*
 * As a work of the United States government, this project is in the public domain within the United States.
 */

/*
    Index for everything
    Date Created: September 11, 2007

*/

error_reporting(E_ALL & ~E_NOTICE);

if (false)
{
    echo '<img src="/libs/dynicons/?img=dialog-error.svg&amp;w=96" alt="error" style="float: left" /><div style="font: 36px verdana">Site currently undergoing maintenance, will be back shortly!</div>';
    exit();
}

include __DIR__ . '/globals.php';
include __DIR__ . '/../libs/smarty/Smarty.class.php';
include __DIR__ . '/Login.php';
include __DIR__ . '/db_mysql.php';
include __DIR__ . '/form.php';

if (!class_exists('XSSHelpers'))
{
    include_once dirname(__FILE__) . '/../libs/php-commons/XSSHelpers.php';
}

header('X-UA-Compatible: IE=edge');

$db = new DB($db_config->dbHost, $db_config->dbUser, $db_config->dbPass, $db_config->dbName);
$db_phonebook = new DB($config->phonedbHost, $config->phonedbUser, $config->phonedbPass, $config->phonedbName);
unset($db_config);

$login = new Login($db_phonebook, $db);

$login->loginUser();
if (!$login->isLogin() || !$login->isInDB())
{
    echo 'Your login is not recognized. Your server administrator may need to verify that your account is in the correct Active Directory group.<br />';
    exit;
}

$main = new Smarty;
$main->setTemplateDir(__DIR__."/templates/")->setCompileDir(__DIR__."/templates_c/");
$t_login = new Smarty;
$t_login->setTemplateDir(__DIR__."/templates/")->setCompileDir(__DIR__."/templates_c/");
$t_menu = new Smarty;
$t_menu->setTemplateDir(__DIR__."/templates/")->setCompileDir(__DIR__."/templates_c/");
$o_login = '';
$o_menu = '';
$tabText = '';

$action = isset($_GET['a']) ? XSSHelpers::xscrub($_GET['a']) : '';

// HQ logo
$main->assign('logo', '<img src="images/VA_icon_small.png" style="width: 80px" alt="VA logo" />');

function customTemplate($tpl, $portalPath)
{
    $cleanPortalPath = str_replace("/", "_", $portalPath);

    $customTemplatePath = __DIR__ . "/templates/custom_override/". $cleanPortalPath . "_{$tpl}";
    if (file_exists($customTemplatePath)) {
        return "custom_override/". $cleanPortalPath . "_{$tpl}";
    } else {
        return $tpl;
    }
}

$t_login->assign('name', $login->getName());
$t_menu->assign('is_admin', $login->checkGroup(1));

$main->assign('useUI', false);

$settings = $db->query_kv('SELECT * FROM settings', 'setting', 'data');

foreach (array_keys($settings) as $key)
{
    $settings[$key] = XSSHelpers::sanitizeHTMLRich($settings[$key]);
}

switch ($action) {
    case 'showServiceFTEstatus':
        $main->assign('useUI', true);
        $main->assign('javascripts', array('js/form.js', 'js/workflow.js', 'js/formGrid.js', 'js/formQuery.js'));

        $form = new Form($db, $login);
        $o_login = $t_login->fetch('login.tpl');

        $currentEmployee = $form->employee->lookupLogin($login->getUserID());
        $employeePositions = $form->employee->getPositions($currentEmployee[0]['empUID']);
        $resolvedService = $form->position->getService($employeePositions[0]['positionID']);

        $t_form = new Smarty;
        $t_form->setTemplateDir(__DIR__."/templates/")->setCompileDir(__DIR__."/templates_c/");
        $t_form->left_delimiter = '<!--{';
        $t_form->right_delimiter = '}-->';
        $t_form->assign('services', $form->getServices2());
        $t_form->assign('resolvedServiceID', $resolvedService[0]['groupID']);
        $t_form->assign('CSRFToken', $_SESSION['CSRFToken']);

        //url
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        $qrcodeURL = "{$protocol}://" . HTTP_HOST . $_SERVER['REQUEST_URI'];
        $main->assign('qrcodeURL', urlencode($qrcodeURL));

        $main->assign('body', $t_form->fetch('reports/showServiceFTEstatus.tpl'));
        $tabText = 'Service FTE Status';

        break;
    default:
        $cleanPortalPath = str_replace("/", "_", $config->portalPath);

        if ($action != '' && (file_exists(__DIR__."/templates/reports/{$action}.tpl") || file_exists(__DIR__."/templates/reports/custom_override/" . $cleanPortalPath . "_{$action}.tpl")))
        {
            $main->assign('useUI', true);
            $main->assign('javascripts', array(
                'js/form.js',
                'js/workflow.js',
                'js/formGrid.js',
                'js/formQuery.js',
                'js/formSearch.js',
                '/libs/jsapi/nexus/LEAFNexusAPI.js',
                '/libs/jsapi/portal/LEAFPortalAPI.js',
                '/libs/jsapi/portal/model/FormQuery.js',
            ));

            $form = new Form($db, $login);
            $o_login = $t_login->fetch('login.tpl');

            $t_form = new Smarty;
            $t_form->setTemplateDir(__DIR__."/templates/")->setCompileDir(__DIR__."/templates_c/");
            $t_form->left_delimiter = '<!--{';
            $t_form->right_delimiter = '}-->';
            $t_form->assign('CSRFToken', $_SESSION['CSRFToken']);
            $t_form->assign('userID', $login->getUserID());
            $t_form->assign('empUID', $login->getEmpUID());
            $t_form->assign('empMembership', $login->getMembership());
            $t_form->assign('currUserActualName', XSSHelpers::xscrub($login->getName()));
            $t_form->assign('orgchartPath', $config->orgchartPath);
            $t_form->assign('systemSettings', $settings);
            $t_form->assign('LEAF_NEXUS_URL', LEAF_NEXUS_URL);
            $t_form->assign('city', $settings['subHeading'] == '' ? $config->city : $settings['subHeading']);

            //url
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
            $qrcodeURL = "{$protocol}://" . HTTP_HOST . $_SERVER['REQUEST_URI'];
            $main->assign('qrcodeURL', urlencode($qrcodeURL));

            if (file_exists(__DIR__."/templates/reports/custom_override/" . $cleanPortalPath . "_{$action}.tpl")) {
                $main->assign('body', $t_form->fetch("reports/custom_override/" . $cleanPortalPath . "_{$action}.tpl"));
                $tabText = '';
            }
            else
            {
                $main->assign('body', $t_form->fetch("reports/{$action}.tpl"));
                $tabText = '';
            } 
        }
        else
        {
            $main->assign('body', 'Report does not exist');
        }

        break;
}

$main->assign('leafSecure', XSSHelpers::sanitizeHTML($settings['leafSecure']));
$main->assign('login', $t_login->fetch('login.tpl'));
$t_menu->assign('action', $action);
$t_menu->assign('orgchartPath', $config->orgchartPath);
$t_menu->assign('empMembership', $login->getMembership());
$o_menu = $t_menu->fetch(customTemplate('menu.tpl', $config->portalPath));
$main->assign('menu', $o_menu);
$tabText = $tabText == '' ? '' : $tabText . '&nbsp;';
$main->assign('tabText', $tabText);

$main->assign('title', $settings['heading'] == '' ? $config->title : $settings['heading']);
$main->assign('city', $settings['subHeading'] == '' ? $config->city : $settings['subHeading']);
$main->assign('revision', $settings['version']);

if (!isset($_GET['iframe']))
{
    $main->display(customTemplate('main.tpl', $config->portalPath));
}
else
{
    $main->display(customTemplate('main_iframe.tpl', $config->portalPath));
}
