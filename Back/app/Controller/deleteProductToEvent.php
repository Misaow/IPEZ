<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";


$deleteProductToEvent = false;

if((!empty($id))){
    $TEvent_id = explode('/', $id)[0];
    $TTypeProduit_id =  explode('/', $id)[1];;
    $typeevent = new \app\core\TypeEvent();
    $typeevent->deleteTypeEvent($TEvent_id, $TTypeProduit_id);
    $deleteProductToEvent = true;
}