<?php

//verifie si il est connecté
//si il n est pas connecté envoyé sur la page d'inscription
//mettre a jour le champs 1 = inscrit 0 si desabo

$log = app\core\User::isAlreadyLogged($id);
$desabo = false;
if ($log){
    $user = new app\core\Client();
    $user->setId($_SESSION['id']);
    $user->setNewsletter(0);
    $desabo = true;
}