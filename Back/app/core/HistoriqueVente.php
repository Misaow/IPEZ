<?php

namespace app\core;
/**
 * Description of HistoriqueVente
 *
 * @author AD
 */
class HistoriqueVente {
    
    private $id;
    private $TEvent_id;
    private $TProduit_id;
    private $nb_vente;
    
    private $db;
    /**
     * Constructeur de historique
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
                        $this->db = new \app\core\Database();
                         $this->db->connect();
    }
    
    public function getall() {
        $result = $this->db->select("thistoriquevente","*");
        $result = $this->db->getResult();
        return $result;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getTEvent_id() {
        return $this->TEvent_id;
    }

    public function getTProduit_id() {
        return $this->TProduit_id;
    }

    public function getNb_vente() {
        return $this->nb_vente;
    }

    public function setTEvent_id($TEvent_id) {
        $this->TEvent_id = $TEvent_id;
    }

    public function setTProduit_id($TProduit_id) {
        $this->TProduit_id = $TProduit_id;
    }

    public function setNb_vente($nb_vente) {
        $this->nb_vente = $nb_vente;
    }

        public function addHistoriqueVente(HistoriqueVente $historique) {
        $req = $this->db->insert("thistoriquevente", $historique->getDonnees());
        return $req;
    }
    
    /**
     *
     */
    public function setDonnees() {
        $this->donnees = array(
            'TEvent_id' => $this->getTEvent_id(),
            'TProduit_id'=> $this->getTProduit_id(),
            'nb_Vente'=>  $this->getNb_vente()
        );
        
        
        return $this;
    }
        public function setDonneesUp() {
        $this->donnees = array(
            'nb_Vente'=>  $this->getNb_vente()
        );

        }
        

    /**
     * Retourne Donnees
     * @return array
     */
    public function getDonnees() {
        return $this->donnees;
    }

/**
 * Delete Product by id
 * @param type $id
 * @return type
 */
    public function deleteHistoriqueVente($id) {
        
    return $this->db->delete('thistoriquevente', 'id='.$id);
        
    }
    
}
