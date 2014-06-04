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
     *
     * @var array
     */
    
    private $donnees = array();
    
    
    /**
     * Constructeur de Produit
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
    }
    
    

    /**
     * Initialise les valeurs de Produit
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
            'description' => $this->getDescription(),
            'nb_vente' => $this->getNb_vente(),
            'nb_stock' => $this->getNb_stock()
               
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
     * @return \app\core\Produit
     */
    public function setDonneesUp() {
        $this->donnees = array(
            'nom' => $this->getNom(),
            'description' => $this->getDescription(),
            'nb_vente' => $this->getNb_vente(),
            'nb_stock' => $this->getNb_stock()
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
     * @return type $nb_vente
     */
    public function getNb_vente() {
        return $this->nb_vente;
    }
    
        /**
     * Return list of top sale product
     * @return type
     */
    public function topVenteProduits() {
        
        $this->db = new \app\core\Database();
        $this->db->select('tevent, thistoriquevente',"TEvent_id, TProduit_id",NULL, 'DATE < NOW()', 'nb_vente DESC', '10');
        return $this->db->getResult();

       
    }

    /**
     * 
     * @return type $nb_stock
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
