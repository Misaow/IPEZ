<?php

$event_id = isset($_POST['idevent']) ? $_POST['idevent'] : "";
$produit_id = isset($_POST['idproduit']) ? $_POST['idproduit'] : "";
$vente = isset($_POST['valuevente']) ? $_POST['valuevente'] : "";

if(!empty($event_id))
{
    $histo = new app\core\HistoriqueVente();
    $histo->setNb_vente($vente);
    $histo->setTEvent_id($event_id);
    $histo->setTProduit_id($produit_id);
    $histo->setDonnees()->addHistoriqueVente($histo);
}