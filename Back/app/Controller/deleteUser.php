<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";

 $userdelete = false;
if(!empty($id) && (\app\core\User::isAdmin($_SESSION['id'], $_SESSION['login']) )){
  
   $user = new \app\core\User();
   $user->deleteUser($id);
   $userdelete = true;
}
