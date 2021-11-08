<?php

$conf->serverName = "localhost:80";
$conf->serverUrl = "http://" . $conf->serverName;
$conf->appRoot = "/as-cwiczenia-2021Z";
$conf->mainController = '/app/controllers/mainController.php';
$conf->appUrl = $conf->serverUrl . $conf->appRoot;
$conf->rootPath = dirname(__DIR__);
$conf->actionRoot = $conf->appRoot . $conf->mainController . '?action=';
$conf->actionUrl = $conf->serverUrl . $conf->actionRoot;