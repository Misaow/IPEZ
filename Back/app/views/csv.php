<?php
session_start();
define('ROOT', dirname(dirname(__DIR__)));
include ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'defines.php';
include '../Autoloader.php';

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('../ExportCsv/test', 'w');

// output the column headings
fputcsv($output, array('nom', 'prenom', 'mail'));

// fetch the data
$result = new \app\core\Database();

$result->connect();

$rows = $result->select('tclient,tparticipation',"nom, prenom, mail", NULL, 'TClient_id = tclient.id AND TEvent_id=1');
  var_dump($rows);
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);