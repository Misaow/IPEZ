<?php

$id   = isset($_POST["id"]) ? $_POST["id"] : "";

$user = new app\core\User();
$result = $user->getUserByID($id);


