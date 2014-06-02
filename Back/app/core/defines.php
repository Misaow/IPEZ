<?php
$webroot= explode("/", $_SERVER['SCRIPT_NAME']);

define( '__APP', true );
define( 'DS', DIRECTORY_SEPARATOR );
define( 'ADMIN_PATH', ROOT . DS . 'admin' );
define( 'APP', ROOT . DS . 'app' );
define( 'WEBROOT', '/' . $webroot[1]);
