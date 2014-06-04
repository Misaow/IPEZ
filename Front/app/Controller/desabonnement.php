<?php

//verifie si il est connecté
//si il n est pas connecté envoyé sur la page d'inscription
//mettre a jour le champs 1 = inscrit 0 si desabo


$desabo = false;
if (!empty($_SESSION['id']) && $_GET['desabonner'] == "yes"){
    $user = new app\core\Client();
    $user->setId($_SESSION['id']);
    $user->setNewsletter(0);
    $desabo = true;
}else{
    //a Modifier en inscription.php
      header("Refresh: 3; URL=index.php"); 
      exit();

}