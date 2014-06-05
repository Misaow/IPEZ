<?php

$id   = isset($_POST["id"]) ? $_POST["id"] : "";

$typeproduit = new \app\core\TypeProduit();
$typeproduct = $typeproduit->getTypeProduit();


