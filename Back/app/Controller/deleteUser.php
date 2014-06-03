<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";

if(!empty($id)){
  
   $user = new \app\core\User();
   $user->deleteUser($id);
   
    
}
