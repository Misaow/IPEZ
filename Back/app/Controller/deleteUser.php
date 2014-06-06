<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";

 $userdelete = false;
if(!empty($id)){
  
   $user = new \app\core\User();
   $user->setTable("tadmin");

   $userdelete = true;
}
