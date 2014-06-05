<?php

$id = isset($_POST["TTypeProduit_id"]) ? $_POST["TTypeProduit_id"] : "";

 $deletetypeproduit = false;
if(!empty($id) && (\app\core\User::isAdmin($_SESSION['id'], $_SESSION['login']) )){
  
   $typeproduit = new \app\core\TypeProduit();
   $typeproduit->deleteTypeProduit($id);
   $deletetypeproduit = true;
   
}
