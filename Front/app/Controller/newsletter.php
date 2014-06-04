<?php

//verifie si il est connecté
//si il n est pas connecté envoyé sur la page d'inscription
//mettre a jour le champs 1 = inscrit 0 si desabo

$log = app\core\User::isAlreadyLogged($id);
$inscriptionnews = false;
if ($log){
    $user = new app\core\Client();
    $user->setId($_SESSION['id']);
    $user->setNewsletter(1);
    $inscriptionnews = true;
}else{
    //a Modifier en inscription.php
      header("Refresh: 3; URL=index.php"); 

}

