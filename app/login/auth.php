<?php
require_once dirname(__FILE__) . '/../../config/config.php';

session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

if (empty($role)){
	include dirname(__FILE__) . '/login.php';
	exit();
}