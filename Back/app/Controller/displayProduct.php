<?php
$id   = isset($_POST["id"]) ? $_POST["id"] : "";

$produit = new app\core\Produit();
$products = $produit->getProduits();


