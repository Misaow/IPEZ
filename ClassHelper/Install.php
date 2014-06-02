<?php

namespace app\core;

/**
 * Description of Install
 *
 * @author Harouna
 */
class Install {
    protected $host;
    protected $dbname;
    protected $user;
    protected $pass;
    protected $prefix;
    protected $dbh;


    public function testDbConnect() {
        $this->host = (string)$_POST['host'];
        $this->dbname = (string)$_POST['dbname'];
        $this->user = (string)$_POST['user'];
        $this->pass = (string)$_POST['pass'];
        $this->prefix = (string)$_POST['prefix'];

        if ( empty($this->host) ) {
            return '<p class="alert alert-danger">Entrez la ressource de la base de données (host)</p>';
        }
        if ( empty($this->user) ) {
            return '<p class="alert alert-danger">Entrez l\'utilisateur de la base de données</p>';
        }
        if ( empty($this->dbname) ) {
            return '<p class="alert alert-danger">Entrez le nom de la base de données</p>';
        }

        try{
            $this->dbh = new \PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user, $this->pass,
                        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

            return '<p class="alert alert-success">Votre configuration est correcte</p>';
        }
        catch(PDOException $ex){
            return '<p class="alert alert-danger">Connexion à la base de données impossible !</p>';
        }
    }
    
    public function install()
    {
        $data = $_POST;
        unset($data['type']);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $filename = dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'database.json';
        $fp = fopen($filename, 'w+');        
        
        if (fwrite($fp, $json) === FALSE) {
            echo '<p class="alert alert-danger">Impossible d\'écrire dans le fichier ('.$filename.')</p>';
            exit;
        }
        
        $sql = file_get_contents(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'install'.DIRECTORY_SEPARATOR.'ipmotors.sql');
        $sql = str_replace("#__", $this->prefix, $sql);
        $this->dbh->exec($sql);
        
        fclose($fp);
        
        return '<p class="alert alert-success">Le fichier de configuration a été crée et la base de données imprtée.</p>';
    }
    
    public static function configExists()
    {
        $filename = dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'database.json';
        
        if ( ! file_exists($filename) ) { 
            $parts = explode('/admin/', $_SERVER['SCRIPT_NAME']);
            $url = '/install/';
            if ( count($parts) > 1) {
                $url = $parts[0].'/install/';
            }
            header("location: $url");
        }
    }
}
