<?php

/**
 * Class Vehicule
 * 
 * @author Jonathan JUMARIE
 */

namespace app\core;

class Vehicule {

    /**
     * @var int
     */
    private $id_vehicule;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var bool
     */
    private $is_active;

    /**
     * @var array
     */
    private $donnees = array();

    // Constructeur de Vehicule
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
    }

    // Initialise les valeurs de Vehicule
    public function init(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable(array($this, $method)))
                $this->$method($value);
        }
        $this->setDonnees();
    }

    /**
     * Retourne id_vehicule
     * @return int
     */
    public function getId_vehicule() {
        return (int)$this->id_vehicule;
    }

    /**
     * Retourne nom du véhicule
     * @return string
     */
    public function getNom() {
        return (string)$this->nom;
    }

    /**
     * Retourne is_active
     * @return int
     */
    public function getIs_active() {
        return (int)$this->is_active;
    }

    /**
     * Retourne Donnees
     * @return array
     */
    public function getDonnees() {
        return $this->donnees;
    }

    /**
     * Set id_vehicule
     * @param int $id_vehicule
     * @return \app\core\Vehicule
     */
    protected function setId_vehicule($id_vehicule) {
        $this->id_vehicule = (int) $id_vehicule;
        return $this;
    }

    /**
     * Set nom
     * @param string $nom
     * @return \app\core\Vehicule
     */
    public function setNom($nom) {
        $this->nom = (string) $nom;
        return $this;
    }

    /**
     * Set is_active
     * @param int $is_active
     * @return \app\core\Vehicule
     */
    public function setIs_active($is_active) {
        $this->is_active = (int) $is_active;
        return $this;
    }

    /**
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\Vehicule
     */
    protected function setDonnees() {
        $this->donnees = array(
            'id_vehicule' => '',
            'nom' => $this->getNom(),
            'is_active' => $this->getIs_active(),
        );
        return $this;
    }

    /**
     * Set le Tableau $donnees pour l'update en base
     * @return \app\core\Vehicule
     */
    public function setDonneesUp() {
        $this->donnees = array(
            'nom' => $this->getNom(),
            'is_active' => $this->getIs_active(),
        );
        return $this;
    }

}
