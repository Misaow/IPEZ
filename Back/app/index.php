<?php

/**
 * Description of index
 *
 * @author AD
 */
define( 'ROOT', dirname( __DIR__ ) );
include ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'defines.php';
include APP . DS . 'Autoloader.php';


echo 'test';
$tab = array(
    'id'=>'',
    'prenom' =>'damien',
    'nom'    =>'ge',
    'mail'   =>'aume@fefee.fr',
    'mdp'    =>'test',
    'newsletter'=>'1'
    
    
);


$client = new app\core\Client($tab);
var_dump($client->addClient($client));
var_dump($client);
var_dump($client->getClients());


