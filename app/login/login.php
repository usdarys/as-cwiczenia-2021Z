<?php
require_once dirname(__FILE__) . '/../../config/config.php';
require_once _ROOT_PATH . '/vendor/smarty/smarty/libs/Smarty.class.php';

$form = array();
$messages = array();

getLoginParams($form);

if (!validateLoginParams($form, $messages)) {
	$smarty = new Smarty;

	$smarty->assign('messages', $messages);
	$smarty->assign('form', $form);
	$smarty->assign('appUrl', _APP_URL);

	$smarty->display(dirname(__FILE__) . '/loginView.tpl');
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

