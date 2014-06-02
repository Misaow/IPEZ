<?php

/**
 * Class Choix
 * 
 * @author Jonathan JUMARIE
 */

namespace app\core;

class Choix {

    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $valeur;
    
    /**
     *
     * @var int
     */
    private $is_active;
    
    /**
     *
     * @var int
     */
    private $type;
    
    /**
     *
     * @var array
     */
    private $donnees = array();

    // Constructeur de Choix
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
    }

    // Initialise les valeurs de Choix
    public function init(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable(array($this, $method)))
                $this->$method($value);
        }
        $this->setDonnees();
    }

    /*     * ******** Setters ******* */

    /**
     * Set Id
     * @param int $id
     * @return \app\core\Choix
     */
    public function setId($id) {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * Set Valeur
     * @param string $valeur
     * @return \app\core\Choix
     */
    public function setValeur($valeur) {
        $this->valeur = (string) $valeur;
        return $this;
    }

    /**
     * Set is_active
     * @param tinyint $is_active
     * @return \app\core\Choix
     */
    public function setIs_active($is_active) {
        $this->is_active = (int)$is_active;
        return $this;
    }

    /**
     * Set Type
     * @param int $type
     * @return \app\core\Choix
     */
    public function setType($type) {
        $this->type = (int)$type;
        return $this;
    }

    /**
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\Choix
     */
    public function setDonnees() {
        $this->donnees = array(
            'id' => '',
            'Valeur' => $this->getValeur(),
            'is_active' => $this->getIs_active(),
            'Type' => $this->getType()
        );
        return $this;
    }

    /**
     * Set le Tableau $donnes sans l'id pour l'update
     * @return \app\core\Choix
     */
    public function setDonneesUp() {
        $this->donnees = array(
            'Valeur' => $this->getValeur(),
            'is_active' => $this->getIs_active(),
            'Type' => $this->getType()
        );
        return $this;
    }

    /*     * ******* Getters ******** */

    /**
     * Return id
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Return Valeur
     * @return string
     */
    public function getValeur() {
        return $this->valeur;
    }

    /**
     * Return Donnees
     * @return array
     */
    public function getDonnees() {
        return $this->donnees;
    }

    /**
     * Return Is active
     * @return tinyint
     */
    public function getIs_active() {
        return $this->is_active;
    }

    /**
     * Return Type
     * @return int
     */
    public function getType() {
        return $this->type;
    }

}
