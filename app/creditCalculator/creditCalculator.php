<?php

require_once dirname(__FILE__) . '/../../config.php';
require_once _ROOT_PATH . '/utils/utils.php';

include _ROOT_PATH . '/app/login/auth.php';

$amount = null;
$numberOfYears = null;
$interest = null;
$installment = null;
$messages = array();

getCalculatorParams($amount, $numberOfYears, $interest);

if (validateCalculatorParams($amount, $numberOfYears, $interest, $messages)) {
	$installment = calculateCreditInstallment($amount, $numberOfYears, $interest);
}

include 'creditCalculatorView.php';


function getCalculatorParams(&$amount, &$numberOfYears, &$interest) {
	$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
	$numberOfYears = isset($_REQUEST['numberOfYears']) ? $_REQUEST['numberOfYears'] : null;
	$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}

function validateCalculatorParams($amount, $numberOfYears, $interest, &$messages) {
	if (!isset($amount) || !isset($numberOfYears) || !isset($interest)) {
		return false;
	}

	if (!is_numeric($amount)) {
		$messages[] = "Niepoprawny format kwoty";
	}
	
	if (!is_numeric($numberOfYears)) {
		$messages[] = "Niepoprawny format liczby lat";
	}
	
	if (!is_numeric($interest)) {
		$messages[] = "Niepoprawny format oprocentowania";
	}

	if (!empty($messages)) {
		return false;
	}
	
	$amount = floatval($amount);
	$numberOfYears = intval($numberOfYears);
	$interest = floatval($interest);
	
	if ($amount <= 0) {
		$messages[] = "Kwota musi być większa od zera";
	}

	if ($numberOfYears <= 0) {
		$messages[] = "Liczba lat musi byc min. 1";
	}

	if ($interest < 0) {
		$messages[] = "Oprocentowanie nie moze być mniejsze niż 0";
	}

	if (!empty($messages)) {
		return false;
	}

	return true;
}

function calculateCreditInstallment($amount, $numberOfYears, $interest) {
	if ($interest == 0) {
		$installment = $amount / ($numberOfYears * 12);
	} else {
		$installment = ($amount / ($numberOfYears * 12)) + ($interest * $amount / 100);
	}

	return $installment;
}