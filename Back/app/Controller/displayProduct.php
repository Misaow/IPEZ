<?php
$id   = isset($_POST["id"]) ? $_POST["id"] : "";

$produit = new app\core\Produit();
$result = $produit->getProduitById($id);


