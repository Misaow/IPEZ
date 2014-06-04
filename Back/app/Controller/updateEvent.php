<?php

$nom         = isset($_POST["nom"]) ? $_POST["nom"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";
$date    = isset($_POST["date"]) ? $_POST["date"] : "";
$heure    = isset($_POST["heure"]) ? $_POST["heure"] : "";
$lieu   = isset($_POST["lieu"]) ? $_POST["lieu"] : "";

$updateevent = false;

if(!empty($nom)){
    
    $event = new app\core\Event();
    $event->setDate($date);
    $event->setDescription($description);
    $event->setHeure($heure);
    $event->setNom($nom);
    $event->setLieu($lieu);
    
    $event->updateEvent($event);
    $updateevent = true;
}
