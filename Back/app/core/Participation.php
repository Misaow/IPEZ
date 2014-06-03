<?php

namespace app\core;
/**
 * Description of Participation
 *
 * @author Damien LAUNAY
 */
class Participation {

    private $TClient_id;
    private $TEvent_id;
 
    
     /**
     *
     * @var array
     */
    
    private $donnees = array();
    
    
    /**
     * Constructeur de Participation
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
     
                $this->db = new \app\core\Database();
        $this->db->connect();
    }
    
    

    /**
     * Initialise les valeurs de Participation
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
     * Delete participation by Id
     * @param type $TClient_id
     * @param type $TEvent_id
     * @return type
     */
public function deleteParticipation($TClient_id,$TEvent_id) {
        
   return $this->db->delete('tparticipation', 'TClient_id='.$TClient_id.'AND $TEvent_id='.$TEvent_id);
        
    }
    
        public function addParticipation(Participation $participation){

        $req = $this->db->insert("tparticipation", $participation->getDonnees());
        return $req;
    }
    
    
    /**
     * Retourne liste des participation
     * @return type
     */
        public function getParticipation(){
        $this->db = new \app\core\Database();
        $this->db->select('tparticipation');
        return $this->db->getResult();
        
    }
    /**
     * Return Participation by id
     * @param type $id
     * @return type
     */
     public function getParticipationById($id){
        $this->db = new \app\core\Database();
        $this->db->select('tparticipation', '*', null, 'id='.$id);
        return $this->db->getResult();
        
    }
    
      /**
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\Choix
     */
    public function setDonnees() {
        $this->donnees = array(
            'TClient_id' => $this->getTClient_id(),
            'TEvent_id'=> $this->getTEvent_id()     
             
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
     * Set le Tableau $donnees pour l'update en base
     * @return \app\core\Participation
     */
    public function setDonneesUp() {
        $this->donnees = array(
             'TClient_id' => $this->getTClient_id(),
            'TEvent_id'=> $this->getTEvent_id()      
        );
        return $this;
    }
    /**
     * retourne l id de la participation
     * @return type
     */
    public function getId() {
        return $this->id;
    }


        
    
    /**
     * 
     * @return type $TClient_id
     */
    public function getTClient_id() {
        return $this->TClient_id;
    }

    /**
     * 
     * @return type $TEvent_id
     */
    public function getTEvent_id() {
        return $this->TEvent_id;
    }

    /**
     * 
     * @param type $TClient_id
     */
    public function setTClient_id($TClient_id) {
        $this->TClient_id = $TClient_id;
    }

    /**
     * 
     * @param type $TEvent_id
     */
    public function setTEvent_id($TEvent_id) {
        $this->TEvent_id = $TEvent_id;
    }


    
}
