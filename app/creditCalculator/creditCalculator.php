<?php

require_once dirname(__FILE__) . '/../../config/config.php';
require_once $conf->rootPath . '/app/creditCalculator/CreditCalculatorController.class.php';

$controller = new CreditCalculatorController();
$controller->process();