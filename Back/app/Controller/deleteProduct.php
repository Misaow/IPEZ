<?php

$id = isset($_POST["id"]) ? $_POST["id"] : "";

 $deleteproduct = false;
if(!empty($id) && (\app\core\User::isAdmin($_SESSION['id'], $_SESSION['login']) )){
  
   $produit = new \app\core\Produit();
   $produit->deleteProduit($id);
   $deleteproduct = true;
   
}
