<?php


$login = isset($_POST["login"]) ? $_POST["login"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$is_admin = isset($_POST["is_admin"]) ? $_POST["is_admin"] : "";
$usercreate = false;
if(!empty($login)&&(\app\core\User::isAdmin($$_SESSION['id'], $_SESSION['login'])))
{
     $user = new app\core\User();
     $user->setLogin($login);
     $user->setmdp($mdp);
     $user->setIs_admin($is_admin);
     $user->createUser();
     $usercreate = true;
}