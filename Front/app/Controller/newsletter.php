<?php

//verifie si il est connecté
//si il n est pas connecté envoyé sur la page d'inscription
//mettre a jour le champs 1 = inscrit 0 si desabo


$inscriptionnews = false;
if (!empty($_SESSION['id']) && $_GET['inscription'] == "yes"){
    $user = new app\core\Client();
    $user->setId($_SESSION['id']);
    $user->setNewsletter(1);
    $user->setDonneesNewsletter();
    $user->updateClient($user);
    $inscriptionnews = true;
}else{
    //a Modifier en inscription.php
      header("Refresh: 3; URL=index.php"); 
      exit();

}

