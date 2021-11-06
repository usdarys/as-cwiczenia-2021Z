<?php
require_once dirname(__FILE__) . '/../../config/config.php';

session_start();
session_destroy();

header("Location: " . _APP_URL);