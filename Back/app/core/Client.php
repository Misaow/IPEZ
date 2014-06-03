<?php

namespace app\core;
/**
 * Description of TypeProduit
 *
 * @author Damien LAUNAY
 */
class Client extends Database {
    
    private $id;
    private $mail;
    private $nom;
    private $prenom;
    private $mdp;
    private $newsletter;
    
     /**
     *
     * @var array
     */
    private $donnees = array();
    
    
     /**
     * @var Database
     */
    protected $db  ;

    /**
     * Constructeur du client
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
        $this->db = new \app\core\Database();
        $this->db->connect();
    }
    

    public function getClients(){
        $this->db = new \app\core\Database();
        $this->db->select('tclient');
        return $this->db->getResult();
        
    }
    
     public function addClient(Client $client){
        $req = $this->db->insert('tclient', $client->getDonnees());
        return $req;
    }
    
   /**
     * Set le Tableau $donnees pour l'update en base
     * @return \app\core\Client
     */
    public function setDonneesUp() {
        $this->donnees = array(
            'mail' =>  $this->getMail(),
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'newsletter' =>  $this->getNewsletter(),
            'mdp' => $this->getMdp(),

        );
        return $this;
    }

    /**
     * Retourne Donnees
     * @return array
     */
    public function getDonnees() {
        return $this->donnees;
    }
     /**
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\Clien
     */
    public function setDonnees() {
        $this->donnees = array(
            'id' => '',
            'mail' =>  $this->getMail(),
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'newsletter' =>  $this->getNewsletter(),
            'mdp' => $this->getMdp(),
               
        );
        return $this;
    }
    /**
     * Initialise les valeurs du client
     * @param array $donnees
     */
    public function init(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable(array($this, $method)))
                $this->$method($value);
        }
        $this->setDonnees();
    }
    

    /**
     * 
     * @return type
     */
    public function getId() {
        return $this->id;
    }

    
    /**
     * 
     * @return type
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * 
     * @return type
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * 
     * @return type
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * 
     * @return type
     */
    public function getMdp() {
        return $this->mdp;
    }

    /**
     * 
     * @return type
     */
    public function getNewsletter() {
        return $this->newsletter;
    }

    
    /**
     * 
     * @param type $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * 
     * @param type $mail
     */
    public function setMail($mail) {
        $this->mail = $mail;
    }

    /**
     * 
     * @param type $nom
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * 
     * @param type $prenom
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * 
     * @param type $mdp
     */
    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    /**
     * 
     * @param type $newsletter
     */
    public function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;
    }

}
