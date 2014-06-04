<?php

$TTypeProduit_id = isset($_POST["TTypeProduit_id"]) ? $_POST["TTypeProduit_id"] : "";
$TEvent_id = isset($_POST["TEvent_id"]) ? $_POST["TEvent_id"] : "";

$deleteProductToEvent = false;

if((!empty($TEvent_id)) && (!empty($TTypeProduit_id))){
    
    $typeevent = new \app\core\TypeEvent();
    
    $typeevent->deleteTypeEvent($TEvent_id, $TTypeProduit_id);
    
}