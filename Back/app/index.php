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
<<<<<<< HEAD
    'prenom' =>'damien',
    'nom'    =>'ge',
    'mail'   =>'aume@fefee.fr',
    'mdp'    =>'test',
=======
    'mail'=>'aume@fefe.fr',
    'nom'=>'ge',
    'prenom' =>'damien',
    'mdp'=>'test',
>>>>>>> bf83693fa9ae6fe5199aa702f932c52e480dc509
    'newsletter'=>'1'
    
    
);


$client = new app\core\Client($tab);
<<<<<<< HEAD
var_dump($client->addClient($client));
var_dump($client);
var_dump($client->getClients());


=======
$client->addClient($client);
var_dump($client->getClients());
>>>>>>> bf83693fa9ae6fe5199aa702f932c52e480dc509
