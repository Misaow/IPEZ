<?php

$TTypeProduit_id = isset($_POST["TTypeProduit_id"]) ? $_POST["TTypeProduit_id"] : "";
$TEvent_id = isset($_POST["TEvent_id"]) ? $_POST["TEvent_id"] : "";

$addproduittoevent = false;

if((!empty($TEvent_id)) && (!empty($TTypeProduit_id))){

    $typeevent = new \app\core\TypeEvent();
    $typeevent->setTEvent_id($TEvent_id);
    $typeevent->setTTypeProduit_id($TTypeProduit_id);
    
    $typeevent->addTypeEvent($typeevent);
   
    $addproduittoevent = true;
    
}
