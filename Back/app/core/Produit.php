<?php

namespace app\core;
/**
 * Description of Produit
 *
 * @author Damien LAUNAY
 */
class Participation {
    
    private $id;
    private $nom;
    private $description;
    private $nb_vente;
    private $nb_stock;
 
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
    public function getNb_vente() {
        return $this->nb_vente;
    }

    /**
     * 
     * @return type
     */
    public function getNb_stock() {
        return $this->nb_stock;
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
     * @param type $nb_vente
     */
    public function setNb_vente($nb_vente) {
        $this->nb_vente = $nb_vente;
    }

    /**
     * 
     * @param type $nb_stock
     */
    public function setNb_stock($nb_stock) {
        $this->nb_stock = $nb_stock;
    }


}
