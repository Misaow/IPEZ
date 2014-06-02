<?php

namespace app\core;
/**
 * Description of TypeEvent
 *
 * @author Damien LAUNAY
 */
class Participation {
    
    private $TTypeProduit_id;
    private $TEvent_id;
    
    /**
     *
     * @var array
     */
    
    private $donnees = array();
    
 
    /**
     * Constructeur du typeevent
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
    }
    
    

    /**
     * Initialise les valeurs du typeEvent
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
            'TTypeProduit_id' => $this->getTTypeProduit_id(),
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
     * @return \app\core\TypeEvent
     */
    public function setDonneesUp() {
        $this->donnees = array(
            'TTypeProduit_id' => $this->getTTypeProduit_id(),
            'TEvent_id'=> $this->getTEvent_id()
        );
        return $this;
    }
    
    
    /**
     * 
     * @return type $Produit_id
     */
    public function getTTypeProduit_id() {
        return $this->TTypeProduit_id;
    }

    /**
     * 
     * @return type $event_id
     */
    public function getTEvent_id() {
        return $this->TEvent_id;
    }

    /**
     * 
     * @return type $produit_id
     */
    public function setTTypeProduit_id($TTypeProduit_id) {
        $this->TTypeProduit_id = $TTypeProduit_id;
    }

    /**
     * 
     * @return type $event_id
     */
    public function setTEvent_id($TEvent_id) {
        $this->TEvent_id = $TEvent_id;
    }



    
}
