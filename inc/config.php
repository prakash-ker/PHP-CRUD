<?php
session_start();
$GLOBALS['site_url'] = "http://localhost/prakash/TRAINING_SESSION/PHP-CRUD/";
$GLOBALS['assets_url'] = "http://localhost/prakash/TRAINING_SESSION/PHP-CRUD/assets/";
$GLOBALS['db_servername'] = "localhost";
$GLOBALS['db_username'] = "root";
$GLOBALS['db_password'] = "";
$GLOBALS['db_name'] = "php_crud";
$GLOBALS['cookie_name'] = "php_crud_login";

include_once ('inc/user.inc.php');
include_once ('inc/mysqli.inc.php');
include_once ('inc/functions.php');
include_once ('inc/auth.inc.php');

