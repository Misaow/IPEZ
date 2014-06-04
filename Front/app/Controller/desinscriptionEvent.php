<?php

$TClient_id  = isset($_SESSION["id"]) ? $_SESSION["id"] : ""; 
$TEvent_id = isset($_GET['desinscription']) ? $_GET['desinscription'] : "";

$deleteparticipation = false;

if((!empty($TEvent_id)) && (!empty($TClient_id ))){
    
    $participation = new \app\core\Participation();
    $participation->deleteParticipation($TClient_id, $TEvent_id);
    
    $deleteparticipation = true;
}