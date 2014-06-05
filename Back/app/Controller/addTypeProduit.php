<?php

$nom         = isset($_POST["nom"]) ? $_POST["nom"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";


$addtypeproduit = false;

if(!empty($nom)){
    
    $typeproduit = new app\core\TypeProduit();
    $typeproduit->setDescription($description);
    $typeproduit->setNom($nom);
    $typeproduit->setDonnees();
    $typeproduit->addTypeProduit($typeproduit);
    
    
    
    $addtypeproduit = true;
  
}