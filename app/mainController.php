<?php

require_once dirname(__DIR__) . '/config/config.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

switch($action) {
    default: 
        include_once $conf->rootPath . '/app/creditCalculator/CreditCalculatorController.class.php';
        $controller = new CreditCalculatorController();
        $controller->process();
    break;
    case 'creditCalculator':
        include_once $conf->rootPath . '/app/creditCalculator/CreditCalculatorController.class.php';
        $controller = new CreditCalculatorController();
        $controller->process();      
    break;
}