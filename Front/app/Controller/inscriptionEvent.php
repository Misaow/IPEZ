<?php

$inscription = false;

$TClient_id  = isset($_SESSION["id"]) ? $_SESSION["id"] : ""; 
$TEvent_id   = isset($_GET["inscription"]) ? $_GET["inscription"] : "";


if((!empty($TClient_id)) && (!empty($TEvent_id))){

    $participation = new \app\core\Participation();
    $participation->setTClient_id($TClient_id);
    $participation->setTEvent_id($TEvent_id);
    $participation->setDonnees();
    $participation->addParticipation($participation);

    $inscription = true;
    
}

