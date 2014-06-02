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
     * Constructeur du client
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
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
    public function getTTypeProduit_id() {
        return $this->TTypeProduit_id;
    }

    /**
     * 
     * @return type
     */
    public function getTEvent_id() {
        return $this->TEvent_id;
    }

    /**
     * 
     * @return type
     */
    public function setTTypeProduit_id($TTypeProduit_id) {
        $this->TTypeProduit_id = $TTypeProduit_id;
    }

    /**
     * 
     * @return type
     */
    public function setTEvent_id($TEvent_id) {
        $this->TEvent_id = $TEvent_id;
    }



    
}
