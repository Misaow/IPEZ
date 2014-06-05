<?php

$result = null;

if(isset($_POST["id"]))
{
$result = array();    
$clientevent = new app\core\Participation();
$result = $clientevent->getListParticipantByEvt($_POST["id"]);


}