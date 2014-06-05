<?php

$nb_vente    = isset($_POST["nb_vente"]) ? $_POST["nb_vente"] : "";

$updateHistoriqueVente = false;

if(!empty($nb_vente)){

    $histo = new app\core\HistoriqueVente();
    $produit = new \app\core\Produit();
    $produit->updateStock($produit, $nb_vente);
    $histo->setNb_vente($nb_vente);
    
    $updateHistoriqueVente = true;
}