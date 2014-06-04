<?php

$inscription = false;

$TClient_id  = isset($_SESSION["id"]) ? $_SESSION["id"] : ""; 
$TEvent_id   = isset($_POST["TEvent_id"]) ? $_POST["TEvent_id"] : "";


if((!empty($TClient_id)) && (!empty($TEvent_id))){

    $participation = new \app\core\Participation();
    $participation->setTClient_id($TClient_id);
    $participation->setTEvent_id($TEvent_id);
    
    $participation->addParticipation($participation);

    $inscription = true;
    
}

