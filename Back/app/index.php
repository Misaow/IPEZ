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
    'mail'=>'aume@fsefe.fr',
    'nom'=>'ge',
    'prenom' =>'Samien',
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
    'nom'=>'Galaxy tab 6',
    'description'=>'Samsung Ipad 6 TAblette, le telephone des loosers',
    'nb_vente' =>'0',
    'nb_stock'=>'15',
    'TTypeProduit_id' => '2 ',

);
$produit = new app\core\Produit($tabproduit);
$tabproduit2 = array(
    'id'=>'12',
    'nom'=>'Ipad 6',
    'description'=>'Apple Ipad 6 TAblette, le telephone des loosers',
    'nb_vente' =>'5',
    'nb_stock'=>'10',
    'TTypeProduit_id' => '2 ',

);

//$client = new app\core\Client($tab);
//$client->addClient($client);

//$event = new \app\core\Event($tabevent);
//$event->deleteClient(2);
//$event->deleteClient(9);


//var_dump($event->getEvents());
//var_dump($client->getClientsById(1));


$produit2 = new app\core\Produit($tabproduit2);


//$produit->deleteProduit(10 );
$produit = new app\core\Produit($tabproduit);
$produit->addProduit($produit);
//$produit->updateProduit($produit2);
//$produit->updateStock($produit2, 2);
var_dump($produit->topVenteProduits());
//var_dump($produit->getProduitById(1));
