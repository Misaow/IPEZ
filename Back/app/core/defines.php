<?php
namespace app\core;

$webroot= explode("/", $_SERVER['SCRIPT_NAME']);

define( '__APP', true );
define( 'DS', DIRECTORY_SEPARATOR );
define( 'ADMIN_PATH', ROOT . DS . 'admin' );
define( 'APP', ROOT . DS . 'app' );
define( 'CONTROLLER_DIRECTORY', ROOT . DS . 'app' . DS . 'Controller');
define( 'WEBROOT','/'.$webroot[1] . '/' . $webroot[2]);
define( 'VIEWS_DIRECTORY' , APP . DS . 'views');
define( 'CSS_DIRECTORY', WEBROOT . DS . 'app' . DS . 'content' . DS . 'css');
define( 'JS_DIRECTORY', WEBROOT . DS . 'app'  . DS . 'content' . DS . 'js');
define( 'IMG_DIRECTORY', WEBROOT . DS . 'app'  . DS . 'content' . DS . 'images');