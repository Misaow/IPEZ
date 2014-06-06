<?php

$vente_id = isset($_POST['idevent']) ? $_POST['idevent'] : "";

if(!empty($vente_id))
{
    $histo = new app\core\HistoriqueVente();
    
    $histo->deleteHistoriqueVente($vente_id);
    
}