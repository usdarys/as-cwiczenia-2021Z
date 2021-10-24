<?php

require_once dirname(__FILE__).'/../config.php';

$amount = array_key_exists('amount', $_REQUEST) ? $_REQUEST['amount'] : "";
$numberOfYears = array_key_exists('numberOfYears', $_REQUEST) ? $_REQUEST['numberOfYears'] : "";
$interest = array_key_exists('interest', $_REQUEST) ? $_REQUEST['interest'] : "";

if (!isset($amount) || $amount == "") {
	$messages[] = "Nie podano kwoty";
}

if (!isset($numberOfYears) || $numberOfYears == "") {
	$messages[] = "Nie podano liczby lat";
}

if (!isset($interest) || $interest == "") {
	$messages[] = "Nie podano oprocentowania";
}

if (empty($messages)) {
	if (!is_numeric($amount)) {
		$messages[] = 'Nieprawidłowy format kwoty';
	}
	
	if (!is_numeric($numberOfYears)) {
		$messages[] = 'Nieprawidłowy format liczby lat';
	}

	if (!is_numeric($interest)) {
		$messages[] = 'Nieprawidłowy format oprocentowania';
	}
}

if (empty($messages)) { 
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
}

if (empty($messages)) {
	if ($interest == 0) {
		$installment = $amount / ($numberOfYears * 12);
	} else {
		$installment = ($amount / ($numberOfYears * 12)) + ($interest * $amount / 100);
	}
}

include 'creditCalculatorView.php';