<?php
/************************
    Authenticator for PIV cards/tokens
    Date Created: March 8, 2013

*/

include '../globals.php';
include '../Login.php';
include '../db_mysql.php';
include '../db_config.php';

$db_config = new DB_Config();
$config = new Config();
$db = new DB($db_config->dbHost, $db_config->dbUser, $db_config->dbPass, $db_config->dbName);
$db_phonebook = new DB($config->phonedbHost, $config->phonedbUser, $config->phonedbPass, $config->phonedbName);

// Enforce HTTPS
if(isset($config->enforceHTTPS) && $config->enforceHTTPS == true) {
	if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit();
	}
}

$login = new Login($db_phonebook, $db);

if($_SERVER['SSL_CLIENT_VERIFY'] == 'SUCCESS') {
	$protocol = 'http://';
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$protocol = 'https://';
	}
	$redirect = '';
	if(isset($_GET['r'])) {
        $redirect = $protocol . substr($_SERVER['HTTP_HOST'], 0, -4) . base64_decode($_GET['r']);
    }
    else {
        $redirect = $protocol . substr($_SERVER['HTTP_HOST'], 0, -4) . dirname($_SERVER['PHP_SELF']) . '/../';
    }

	$vars = array(':email' => $_SERVER['SSL_CLIENT_S_DN_UID']);
	$res = $db_phonebook->prepared_query('SELECT * FROM employee_data
											LEFT JOIN employee USING (empUID)
											WHERE indicatorID = 6
												AND data = :email
												AND deleted=0', $vars);

	if(count($res) > 0) {
		$_SESSION['userID'] = $res[0]['userName'];

		header('Location: ' . $redirect);
	}
	else {
		// try searching through national database
		$globalDB = new DB(DIRECTORY_HOST, DIRECTORY_USER, DIRECTORY_PASS, DIRECTORY_DB);
		$vars = array(':email' => $_SERVER['SSL_CLIENT_S_DN_UID']);
		$res = $globalDB->prepared_query('SELECT * FROM employee_data
											LEFT JOIN employee USING (empUID)
											WHERE indicatorID = 6
												AND data = :email
												AND deleted=0', $vars);
		// add user to local DB
		if(count($res) > 0) {
			$vars = array(':firstName' => $res[0]['firstName'],
					':lastName' => $res[0]['lastName'],
					':middleName' => $res[0]['middleName'],
					':userName' => $res[0]['userName'],
					':phoFirstName' => $res[0]['phoneticFirstName'],
					':phoLastName' => $res[0]['phoneticLastName'],
					':domain' => $res[0]['domain'],
					':lastUpdated' => time());
			$db_phonebook->prepared_query('INSERT INTO employee (firstName, lastName, middleName, userName, phoneticFirstName, phoneticLastName, domain, lastUpdated)
        							VALUES (:firstName, :lastName, :middleName, :userName, :phoFirstName, :phoLastName, :domain, :lastUpdated)
									ON DUPLICATE KEY UPDATE deleted=0', $vars);
			$empUID = $db_phonebook->getLastInsertID();
			
			if($empUID == 0) {
                $vars = array(':userName' => $res[0]['userName']);
                $empUID = $db_phonebook->prepared_query('SELECT empUID FROM employee
                                                            WHERE userName=:userName', $vars)[0]['empUID'];
            }

			$vars = array(':empUID' => $empUID,
					      ':indicatorID' => 6,
						  ':data' => $res[0]['data'],
						  ':author' => 'viaLogin',
					      ':timestamp' => time()
			);
			$db_phonebook->prepared_query('INSERT INTO employee_data (empUID, indicatorID, data, author, timestamp)
											VALUES (:empUID, :indicatorID, :data, :author, :timestamp)
											ON DUPLICATE KEY UPDATE data=:data', $vars);
			
			// redirect as usual
			$_SESSION['userID'] = $res[0]['userName'];

			header('Location: ' . $redirect);
		}
		else {
			echo 'Unable to log in: ' . $_SERVER['SSL_CLIENT_S_DN_UID'] . ' not found in database.';
		}
	}
}
else {
    echo 'Unable to log in: Client Verification issue';
}