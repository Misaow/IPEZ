<?php

$TClient_id = isset($_POST["TClient_id"]) ? $_POST["TClient_id"] : "";
$TEvent_id = isset($_POST["TEvent_id"]) ? $_POST["TEvent_id"] : "";

$addparticipation = false;

if((!empty($TClient_id)) && (!empty($TEvent_id))){

    $participation = new \app\core\Participation();
    $participation->setTClient_id($TClient_id);
    $participation->setTEvent_id($TEvent_id);
    
    $participation->addParticipation($participation);

    $addparticipation = true;
    
}

