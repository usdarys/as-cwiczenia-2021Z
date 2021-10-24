<?php
require_once dirname(__FILE__) . '/../../config.php';
require_once _ROOT_PATH . '/utils/utils.php';

$form = array();
$messages = array();

getLoginParams($form);

if (!validateLoginParams($form, $messages)) {
	include 'loginView.php';
} else { 
	header("Location: " . _APP_URL);
}

function getLoginParams(&$form) {
	$form['login'] = isset ($_REQUEST['login']) ? $_REQUEST['login'] : null;
	$form['pass'] = isset ($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}

function validateLoginParams($form, &$messages) {

	if (!isset($form['login']) || !isset($form['pass'])) {
		return false;
	}

	if ($form['login'] == "") {
		$messages[] = 'Nie podano loginu';
	}

	if ($form['pass'] == "") {
		$messages[] = 'Nie podano hasła';
	}

	if (!empty($messages)) {
		return false;
	}

	if ($form['login'] == "admin" && $form['pass'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}

	if ($form['login'] == "user" && $form['pass'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}
	
	$messages[] = 'Niepoprawne dane logowania';
	return false; 
}

