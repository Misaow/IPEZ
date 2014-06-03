<?php

/**
 * Description of index
 *
 * @author AD
 */
define( 'ROOT', dirname( __DIR__ ) );
include ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'defines.php';
include APP . DS . 'Autoloader.php';


//echo 'test';
$tab = array(
    'id'=>'',
    'mail'=>'aume@fefe.fr',
    'nom'=>'ge',
    'prenom' =>'damien',
    'mdp'=>'test',
    'newsletter'=>'1'
    
    
);

$tabevent = array(
    'id'=>'',
    'nom'=>'Apple Product',
    'description'=>'Vente privé de produits Apple',
    'date' =>'2014-07-03',
    'heure'=>'12:40:05',
    'lieu'=>'Paris 18' 
);

$tabproduit = array(
    'id'=>'',
    'nom'=>'HTC 6',
    'description'=>'Apple Iphone 6 Smartphone, le telephone des loosers',
    'nb_vente' =>'0',
    'nb_stock'=>'20',

);

//$client = new app\core\Client($tab);
//$client->addClient($client);

//$event = new \app\core\Event($tabevent);
//$event->deleteClient(2);
//$event->deleteClient(9);


//var_dump($event->getEvents());
//var_dump($client->getClientsById(1));

$produit = new app\core\Produit($tabproduit);

$produit->addProduit($produit);
var_dump($produit->getProduits());
//var_dump($produit->getProduitById(1));
