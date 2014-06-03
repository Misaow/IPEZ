<?php

namespace app\core;
/**
 * Description of Produit
 *
 * @author Damien LAUNAY
 */
class Produit {
    
    private $id;
    private $nom;
    private $description;
    private $nb_vente;
    private $nb_stock;
    private $TTypeProduit_id;
    



    public function getTTypeProduit_id() {
        return $this->TTypeProduit_id;
    }

    public function setTTypeProduit_id($TTypeProduit_id) {
        $this->TTypeProduit_id = $TTypeProduit_id;
    }

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
                        $this->db = new \app\core\Database();
        $this->db->connect();
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
            'nb_stock' => $this->getNb_stock(),
            'TTypeProduit_id' => $this->getTTypeProduit_id(),
               
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
            'nb_stock' => $this->getNb_stock(),
            'TTypeProduit_id' => $this->getTTypeProduit_id()
        );
        return $this;
    }
 /**
 * return list of Products
 * @return type
 */
    public function getProduits(){
        $this->db = new \app\core\Database();
        $this->db->select('tproduit');
        return $this->db->getResult();
        
    }
    /**
     * Return Product by id
     * @param type $id
     * @return type
     */
        public function getProduitById($id){
        $this->db = new \app\core\Database();
        $this->db->select('tproduit', '*', null, 'id='.$id);
        return $this->db->getResult();
        
    }
    
/**
 * Delete Product by id
 * @param type $id
 * @return type
 */
    public function deleteProduit($id) {
        
   return $this->db->delete('tproduit', 'id='.$id);
        
    }
    /**
     * Add Product
     * @param \app\core\Product $produit
     * @return type
     */
         public function addProduit(Produit $produit){
        $req = $this->db->insert("tproduit", $produit->getDonnees());
        return $req;
    }
        /**
     * Update un Product, retourne si la requête à réussi
     * @param \app\core\Product $product
     * @return bool
     */
    public function updateProduit(Produit $produit){
        $produit->setDonneesUp();
        return $this->db->update('tproduit', $produit->getDonnees(), 'id='.$produit->getId());
    }
    
    public function updateStock(Produit $produit, $nb_vente) {
        
       $nb_stock = $produit->getNb_stock() - $nb_vente;
       $produit->nb_stock = $nb_stock;
       
       return $this->db->update('tproduit', array('nb_stock'=>$nb_stock,'nb_vente'=>$nb_vente), 'id='.$produit->getId());
        
    }
    
    public function topVenteProduits() {
        
        $this->db = new \app\core\Database();
        
        $this->db->select('tproduit', '*', null, null, 'nb_vente DESC', '10');
        return $this->db->getResult();

       
    }
    /**
     * Return id Product
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
