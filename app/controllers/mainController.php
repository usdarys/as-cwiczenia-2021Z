<?php

use app\controllers\CreditCalculatorController;

require_once dirname(__FILE__) . '/../../init.php';

switch($action) {
    default: 
        $controller = new CreditCalculatorController();
        $controller->process();
    break;
    case 'creditCalculator':
        $controller = new CreditCalculatorController();
        $controller->process();      
    break;
}