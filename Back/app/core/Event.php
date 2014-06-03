<?php

namespace app\core;
/**
 * Description of Event
 *
 * @author Damien LAUNAY
 */
class Event {
    
    private $id;
    private $nom;
    private $description;
    private $date;
    private $heure;
    private $lieu;
    

    
     /**
     *
     * @var array
     */
    
    private $donnees = array();
    
    /**
     * Constructeur de l'event
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
        
                $this->db = new \app\core\Database();
        $this->db->connect();
    }
    
    

    /**
     * Initialise les valeurs de l'event
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
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\Choix
     */
    public function setDonnees() {
        $this->donnees = array(
            'id' => '',
            'nom'=> $this->getNom(),
            'description'=> $this->getDescription(),
            'date'=> $this->getDate(),
            'heure'=> $this->getHeure(),     
            'lieu'=> $this->getLieu()     
             
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
 * return list of Events
 * @return type
 */
    public function getEvents(){
        $this->db = new \app\core\Database();
        $this->db->select('tevent');
        return $this->db->getResult();
        
    }
    
    
        /**
     * Return Event by id
     * @param type $id
     * @return type
     */
        public function getEventById($id){
        $this->db = new \app\core\Database();
        $this->db->select('tevent', '*', null, 'id='.$id);
        return $this->db->getResult();
        
    }
    /**
     * Add Event
     * @param \app\core\Event $event
     * @return type
     */
         public function addEvent(Event $event){
        $req = $this->db->insert("tevent", $event->getDonnees());
        return $req;
    }
    
/**
 * Delete Event by Id
 * @param type $id
 * @return type
 */
    public function deleteEvent($id) {
        
   return $this->db->delete('tevent', 'id='.$id);
        
    }
    /**
     * Set le Tableau $donnees pour l'update en base
     * @return \app\core\Event
     */
    public function setDonneesUp() {
        $this->donnees = array(
             'id' => $this->getId(),
            'nom'=> $this->getNom(),
            'description'=> $this->getDescription(),
            'date'=> $this->getDate(),
            'heure'=> $this->getHeure(),     
            'lieu'=> $this->getLieu()   
        );
        return $this;
    }
    
    
    /**
     * 
     * @return type $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return type $nom
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * 
     * @return type $description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * 
     * @return type $date
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * 
     * @return type $heure
     */
    public function getHeure() {
        return $this->heure;
    }

    /**
     * 
     * @return type $lieu
     */
    public function getLieu() {
        return $this->lieu;
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
     * @param type $nom
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * 
     * @param type $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * 
     * @param type $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * 
     * @param type $heure
     */
    public function setHeure($heure) {
        $this->heure = $heure;
    }

    /**
     * 
     * @param type $lieu
     */
    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }


}
