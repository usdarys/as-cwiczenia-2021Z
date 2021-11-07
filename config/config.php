<?php
require_once dirname(__FILE__) . '/Config.class.php';

$conf = new Config();

$conf->serverName = "localhost:80";
$conf->serverUrl = "http://" . $conf->serverName;
$conf->appRoot = "/as-cwiczenia-2021Z";
$conf->appUrl = $conf->serverUrl . $conf->appRoot;
$conf->rootPath = dirname(__DIR__);
$conf->actionRoot = $conf->appRoot . '/app/mainController.php?action=';
$conf->actionUrl = $conf->serverUrl . $conf->actionRoot;