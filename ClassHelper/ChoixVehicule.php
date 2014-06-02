<?php

/**
 * Class Choix Vehicule
 * 
 * @author Jonathan JUMARIE
 */

namespace app\core;

class ChoixVehicule {

    /**
     * @var int
     */
    private $idChoixVehicule;

    /**
     * @var int
     */
    private $idVehicule;

    /**
     * @var int
     */
    private $idChoix;

    /**
     * @var array
     */
    private $donnees = array();

    // Constructeur de ChoixVehicule
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
    }

    // Initialise les valeurs de ChoixVehicule
    public function init(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable(array($this, $method)))
                $this->$method($value);
        }
        $this->setDonnees();
    }

    /**
     * Retourne IdChoixVehicule
     * @return int
     */
    public function getIdChoixVehicule() {
        return (int)$this->idChoixVehicule;
    }

    /**
     * Set IdChoixVehicule
     * @param int $idChoixVehicule
     * @return \app\core\ChoixVehicule
     */
    public function setIdChoixVehicule($idChoixVehicule) {
        $this->idChoixVehicule = $idChoixVehicule;
        return $this;
    }

    /**
     * Retourne IdVehicule
     * @return int
     */
    public function getIdVehicule() {
        return (int)$this->idVehicule;
    }

    /**
     * Set IdVehicule
     * @param int $idVehicule
     * @return \app\core\ChoixVehicule
     */
    public function setIdVehicule($idVehicule) {
        $this->idVehicule = $idVehicule;
        return $this;
    }

    /**
     * Retourne IdChoix
     * @return int
     */
    public function getIdChoix() {
        return (int)$this->idChoix;
    }

    /**
     * Set IdChoix
     * @param int $idChoix
     * @return \app\core\ChoixVehicule
     */
    public function setIdChoix($idChoix) {
        $this->idChoix = $idChoix;
        return $this;
    }

    /**
     * Retourne tableau donnees
     * @return array
     */
    public function getDonnees() {
        return $this->donnees;
    }

    /**
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\ChoixVehicule
     */
    public function setDonnees() {
        $this->donnees = array(
            'idChoixVehicule' => '',
            'idVehicule' => $this->getIdVehicule(),
            'idChoix' => $this->getIdChoix(),
        );
        return $this;
    }

    /**
     * Set le Tableau $donnees pour l'update en base
     * @return \app\core\ChoixVehicule
     */
    public function setDonneesUp() {
        $this->donnees = array(
            'idVehicule' => $this->getIdVehicule(),
            'idChoix' => $this->getIdChoix(),
        );
        return $this;
    }

}

?>
