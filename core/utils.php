<?php

function getFrom(&$source, &$idx, &$required, &$requiredMessage){
	if (isset($source[$idx])) {
		return $source[$idx];
	} else {
		if ($required) getMessages()->addError($requiredMessage);
		return null;
	}
}

function getFromRequest($paramName, $required = false, $requiredMessage = null) {
	return getFrom($_REQUEST, $paramName, $required, $requiredMessage);
}

function getFromGet($paramName, $required = false, $requiredMessage = null) {
	return getFrom($_GET, $paramName, $required, $requiredMessage);
}

function getFromPost($paramName, $required = false, $requiredMessage = null) {
	return getFrom($_POST, $paramName, $required, $requiredMessage);
}

function getFromCookies($paramName, $required = false, $requiredMessage = null) {
	return getFrom($_COOKIES, $paramName, $required, $requiredMessage);
}

function getFromSession($paramName, $required = false, $requiredMessage = null) {
	return getFrom($_SESSION, $paramName, $required, $requiredMessage);
}

function forwardTo($actionName) {
	getRouter()->setAction($actionName);
	include getConf()->rootPath . getConf()->mainController;
	exit;
}

function redirectTo($actionName) {
	header("Location: " . getConf()->actionUrl . $actionName);
	exit;
}

function addRole($role) {
	getConf()->roles[$role] = true;
	$_SESSION['_roles'] = serialize(getConf()->roles);
}

function hasRole($role) {
	return isset(getConf()->roles[$role]);
}