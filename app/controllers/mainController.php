<?php



require_once dirname(__FILE__) . '/../../init.php';

getRouter()->setDefaultRoute('creditCalculator');
getRouter()->setUnauthorizedRoute('login');

getRouter()->addRoute('creditCalculator', 'CreditCalculatorController', ['user', 'admin']);
getRouter()->addRoute('login', 'LoginController');
getRouter()->addRoute('logout', 'LoginController', ['user', 'admin']);
getRouter()->addRoute('calcHistory', 'CalcHistoryController', ['user', 'admin']);

getRouter()->go();