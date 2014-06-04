<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";

 $deletetypeproduit = false;
if(!empty($id) && (\app\core\User::isAdmin($_SESSION['id'], $_SESSION['login']) )){
  
   $typeproduit = new \app\core\TypeProduit();
   $typeproduit->deleteTypeProduit($id);
   $deletetypeproduit = true;
   
}
