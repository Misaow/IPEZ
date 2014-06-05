<?php

$id   = isset($_POST["id"]) ? $_POST["id"] : "";


$user = new app\core\User();
$user->setTable("tadmin");
$users = $user->getListUser();


