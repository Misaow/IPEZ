<?php

namespace app\core;
/**
 * Description of TypeProduit
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
    public function getId() {
        return $this->id;
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
    public function getDescription() {
        return $this->description;
    }

    /**
     * 
     * @return type
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * 
     * @return type
     */
    public function getHeure() {
        return $this->heure;
    }

    /**
     * 
     * @return type
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
