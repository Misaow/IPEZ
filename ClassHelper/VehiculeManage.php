<?php

/** 
 * Class VehiculeManage
 * 
 * @author Jonathan JUMARIE
 */

namespace app\core;
use app\core\Database;

class VehiculeManage extends Database{
    
    /**
     * @var Database
     */
    protected $db;
    
    /**
     * Initialise la class VehiculeManage
     * @param \app\core\Database $db
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Add un Vehicule
     * @param \app\core\Vehicule $vehicule
     * @return array
     */
    protected function add(Vehicule $vehicule){
        $req = $this->db->insert('vehicule', $vehicule->getDonnees());
        return $req;
    }

    /**
     * Update un Véhicule, retourne si la requête à réussi
     * @param \app\core\Vehicule $vehicule
     * @return bool
     */
    protected function updateBis(Vehicule $vehicule){
        $vehicule->setDonneesUp();
        return $this->db->update('vehicule', $vehicule->getDonnees(), 'id_vehicule='.$vehicule->getId_vehicule());
    }
    
    /**
     * Delete un Véhicule, retourne si la requête à réussi
     * @param type $id
     * @return bool
     */
    public function deleteVehicule($id){
        return $this->db->delete('vehicule', 'id_vehicule='.$id);
    }
    
    /**
     * Select un Véhicule
     * @param type $info
     * @return array
     */
    public function getVehicule($info){
        if(is_int($info)) // Recherche par Id
            $this->db->select('vehicule', '*', null, 'id_vehicule='.$info);
        else // Recherche par nom
            $this->db->select ('vehicule', '*', NULL, "nom='".$info."'");
        return $this->db->getResult();
    }
    
    /**
     * Select le Véhicule Active
     * @return array
     */
    public function getVehiculeActive(){
        $this->db->select('vehicule', '*', null, 'is_active=1');
        return $this->db->getResult();
    }
    
    /**
     * Select les Véhicules non active
     * @return array
     */
    public function getVehiculeNotActive(){
        $this->db->select('vehicule', '*', null, 'is_active=0');
        return $this->db->getResult();
    }
    
    /**
     * Select tout les Véfhicules
     * @return array
     */
    public function getAllVehicule(){
        $this->db->select('vehicule');
        return $this->db->getResult();
    }
    
    /**
     * Save un Véhicule
     * @param \app\core\Vehicule $vehicule
     * @return bool
     */
    public function save(Vehicule $vehicule) {
        return $this->add($vehicule);
    }
    
    /**
     * Update un Véhicule
     * @param \app\core\Vehicule $vehicule
     * @return bool
     */
    public function updateVehicule(Vehicule $vehicule){
        return $this->updateBis($vehicule);
    }

}
