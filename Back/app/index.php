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
    'mdp'=>'21232f297a57a5a743894a0e4a801fc3',
    'newsletter'=>'1'
    
    
);
$tab2 = array(
    'id'=>'',
    'mail'=>'admin@admin.fr',
    'nom'=>'ge',
    'prenom' =>'Samien',
    'mdp'=>'21232f297a57a5a743894a0e4a801fc3',
    'newsletter'=>'0'
    
    
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
    'nom'=>'Iphone 5 tab 6',
    'description'=>'Aplle Ipad 6 Smartphone, le telephone des loosers',
    'nb_vente' =>'0',
    'nb_stock'=>'15',
    'TTypeProduit_id' => '1 ',
    'image'=>'test.jpg'

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
//$client2 = new app\core\Client($tab2);
//$client2->addClient($client2);

//$event = new \app\core\Event($tabevent);
//$event->deleteClient(2);
//$event->deleteClient(9);


//var_dump($event->getEvents());
//var_dump($client->getClientsById(1));


$produit = new app\core\Produit($tabproduit);
$produit->setId(12);
var_dump($produit->getDescription());

//$produit->deleteProduit(10 );
//$produit = new app\core\Produit($tabproduit);
//$produit->addProduit($produit);
//$produit->updateProduit($produit2);
//$produit->updateStock($produit2, 2);
//var_dump($produit->topVenteProduits());
//var_dump($produit->getProduitById(1));
//var_dump($produit->getProduits());



