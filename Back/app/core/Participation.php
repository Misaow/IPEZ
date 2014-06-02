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
    public function getTClient_id() {
        return $this->TClient_id;
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
