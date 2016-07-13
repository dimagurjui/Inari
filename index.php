<?php

// Front Controller:

// General settings:
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conect system files:
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once ROOT.DS.'autoload.php';

// Start session:
session_start();

// Call Router:
$router = new Router();
$router->run();

