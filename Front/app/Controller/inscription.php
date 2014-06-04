<?php


$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";

$clientcreate = false;
if((!empty($nom))&& (!empty($email)) && (!empty($mdp)))
{
     $client = new \app\core\Client();
     $client->setMail($email);
     $client->setNom($nom);
     $client->setPrenom($prenom);
     $client->setMdp($mdp);
     
     $client->addClient($client);
     $clientcreate = true;
}
