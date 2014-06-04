<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";

 $deleteevent = false;
if(!empty($id) && (\app\core\User::isAdmin($_SESSION['id'], $_SESSION['login']) )){
  
   $event = new \app\core\Event;
   $event->deleteEvent($id);
   $deleteevent = true;
   
}
