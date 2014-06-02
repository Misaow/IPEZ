<?php

$documentRoot = $_SERVER['DOCUMENT_ROOT'];
include $documentRoot . '/CRM_IPMONITOR/app/core/Database.php';
// Get data
$db = new Database();
$db->connect();

if (isset($_POST["type"]) && isset($_POST["id"]))
{
    if ($_POST["type"] == "ajax-voir")
    {
        $db->select('formulaire', '*', NULL, "id = " . $_POST["id"], NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $db->getResult();
        echo'<table style="border: solid 1px black;">';
        foreach ($res as $values)
        {
            echo'<tr><td>' . $values["Nom"] . '</td><td>' . $values["Prenom"] . '</td></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
            echo'<tr></tr>';
        }
        echo'</table>';
    } else if ($_POST["type"] == "ajax-del")
    {
        
    }
} else
{
    $db->select('formulaire', '*', NULL, NULL, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $res = $db->getResult();
    echo'<input id="search"/>';
    echo'<table id="table" style="border: solid 1px black;">
        <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Date de Naissance</th>
                <th>Action</th>
        <tr>
            ';
    foreach ($res as $values)
    {
        echo'<tr data-name="data">
                <td>' . $values["Nom"] . '</td>
                <td>' . $values["Prenom"] . '</td>
                <td>' . $values["Adresse"] . '</td>
                <td>' . $values["DateNaissance"] . '</td>
                <td><a data-type="ajax-voir" data-id=' . $values["Id"] . ' href="javascript:void(0);">Voir</a>  
                    <a data-type="ajax-del" data-id=' . $values["Id"] . ' href="javascript:void(0);">Supprimer</a>
                </td>
            </tr>';
    }
    echo'</table>';
    echo'<div id="log"></div>';
    echo'<script src="http://code.jquery.com/jquery-2.1.1.min.js"> </script>';
    echo'<script src="/CRM_IPMONITOR/public_html/js/jquery.quicksearch.js' . '"></script>';
    echo'<script src="/CRM_IPMONITOR/public_html/js/Mclient.js" type="text/javascript"></script>';
}
