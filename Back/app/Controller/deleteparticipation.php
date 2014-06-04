<?php

$TTypeProduit_id = isset($_POST["TTypeProduit_id"]) ? $_POST["TTypeProduit_id"] : "";
$TEvent_id = isset($_POST["TEvent_id"]) ? $_POST["TEvent_id"] : "";

$deleteparticipation = false;

if((!empty($TEvent_id)) && (!empty($TTypeProduit_id))){
    
    $participation = new \app\core\Participation();
    $participation->deleteParticipation($TClient_id, $TEvent_id);
    
    $deleteparticipation = true;
}