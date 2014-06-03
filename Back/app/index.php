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


$client = new app\core\Client($tab);
$client->addClient($client);

$tab = array(
    'id'=>'2',
    'mail'=>'aume@fefe.fr',
    'nom'=>'ge',
    'prenom' =>'Damien',
    'mdp'=>'test',
    'newsletter'=>'1'
    
    
);
$client2 = new app\core\Client($tab);

$client->updateClient($client2);
var_dump($client->getClients());

