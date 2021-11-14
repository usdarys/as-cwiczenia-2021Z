<?php
// --------------------
// Szablon konfiguracji
// --------------------
$conf->serverName = "localhost:80";
$conf->serverUrl = "http://" . $conf->serverName;
$conf->rootPath = dirname(__DIR__);
$conf->appRoot = "/as-cwiczenia-2021Z";
$conf->mainController = '/app/controllers/mainController.php';
$conf->actionRoot = $conf->appRoot . $conf->mainController . '?action=';
$conf->actionUrl = $conf->serverUrl . $conf->actionRoot;
$conf->appUrl = $conf->serverUrl . $conf->appRoot;

// ----------------------
// Połączenie bazy danych
// ----------------------
$conf->db_type = 'pgsql';
$conf->db_server = 'localhost';
$conf->db_name = '';
$conf->db_user = '';
$conf->db_pass = '';
$conf->db_charset = 'utf8';
$conf->db_port = '5432';
$conf->db_option = [PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];