<?php
define( 'ROOT', dirname(dirname( __DIR__ )) );
include ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'defines.php';
include '../Autoloader.php';
if(isset($_GET["id"])){
$participation = new app\core\Participation();

$participation->WriteCsv($_GET["id"]);
}