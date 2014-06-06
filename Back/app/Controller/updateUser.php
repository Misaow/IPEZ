<?php

$login = isset($_POST["login"]) ? $_POST["login"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$is_admin = isset($_POST["is_admin"]) ? $_POST["is_admin"] : "";
$id = isset($_POST['id']) ? $_POST["id"] : "";


$updateuser = false;

if(!empty($id)){

    $user = new app\core\User();
    $user ->setIs_admin($is_admin);
    $user->setLogin($login);
    $user->setmdp($mdp);
    $user->setId($id);
    $user->setTable("tadmin");
    $user->editUser();
    
   $updateuser = true;
    
}