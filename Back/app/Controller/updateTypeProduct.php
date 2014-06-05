<?php

$nom         = isset($_POST["nom"]) ? $_POST["nom"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";

$updatetypeproduct = false;

if(!empty($nom)){
    
    $typeproduit = new app\core\TypeProduit();
    $typeproduit->setDescription($description);
    $typeproduit->setNom($nom);
    
    $typeproduit->updateTypeProduit($typeproduit);
    
    $updatetypeproduct = true;
}
