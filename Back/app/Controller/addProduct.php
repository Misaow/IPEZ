<?php

$nom         = isset($_POST["nom"]) ? $_POST["nom"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";
$nb_vente    = isset($_POST["nb_vente"]) ? $_POST["nb_vente"] : "";
$nb_stock    = isset($_POST["nb_stock"]) ? $_POST["nb_stock"] : "";
$nb_stock    = isset($_POST["TTypeProduit_id"]) ? $_POST["TTypeProduit_id"] : "";
$image       = isset($_POST["image"]) ? $_POST["image"] : "";


$addproduct = false;

if(!empty($nom)){
    
    $produit = new app\core\Produit();
    $produit->setNom($nom);
    $produit->setDescription($description);
    $produit->setNb_vente($nb_vente);
    $produit->setNb_stock($nb_stock);
    $produit->setImage($image);
    
    $produit->addProduit($produit);
    
    $addproduct = true;
    
}
