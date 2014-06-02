<?php

/** 
 * Class ChoixVehiculeManage
 * 
 * @author Jonathan JUMARIE
 */

namespace app\core;
use app\core\Database;

class ChoixVehiculeManage extends Database{
    
    /**
     * @var Database
     */
    protected $db;
    
    /**
     * Initialise la class ChoixVehiculeManage
     * @param \app\core\Database $db
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Add un choixVehicule, retourne si la requête à réussit
     * @param \app\core\ChoixVehicule $choixVehicule
     * @return bool
     */
    protected function add(ChoixVehicule $choixVehicule){
        $req = $this->db->insert('choixvehicule', $choixVehicule->getDonnees());
        return $req;
    }

    /**
     * Update un choixVehicule, retourne si la requête à réussit
     * Non Utiliser
     * @param \app\core\ChoixVehicule $choixVehicule
     * @return bool
     */
    protected function updateBis(ChoixVehicule $choixVehicule){
        $choixVehicule->setDonneesUp();
        return $this->db->update('choixvehicule', $choixVehicule->getDonnees(), 'idChoixVehicule='.$choixVehicule->getIdChoixVehicule());
    }
    
    /**
     * Delete choixVehicule, retourne si la requête à réussit
     * @param int $idvehicule
     * @param int $idchoix
     * @return bool
     */
    public function deleteChoixVehiculeById($idvehicule, $idchoix){
        return $this->db->delete('choixvehicule', 'idVehicule='.$idvehicule.' '
                . 'and idChoix='.$idchoix);
    }
    
    /**
     * Delete un choixVehicule via id
     * @param int $idchoixvehicule
     * @return bool
     */
    public function deleteChoixById($idchoixvehicule){
        return $this->db->delete('choixvehicule', 'idChoixVehicule='.$idchoixvehicule);
    }
    
    /**
     * Delete un choixVehicule vid id véhicule
     * @param int $idvehicule
     * @return bool
     */
    public function deleteChoixByIdVehicule($idvehicule){
        return $this->db->delete('choixvehicule', 'idVehicule='.$idvehicule);
    }
    
    /**
     * Delete choixVehicule vie id Choix
     * @param int $idchoix
     * @return bool
     */
    public function deleteChoixByIdChoix($idchoix){
        return $this->db->delete('choixvehicule', 'idChoix='.$idchoix);
    }
    
    public function deleteChoixVehicule(ChoixVehicule $choixVehicule){
        return $this->db->delete('choixvehicule', 'idVehicule='.$choixVehicule->getIdVehicule().' '
                . 'and idChoix='.$choixVehicule->getIdChoix());
    }
    
    /**
     * Retourne les choixVehicule via id du Véhicule
     * @param int $id
     * @return array
     */
    public function getChoixByVehicule($id){
        $this->db->select('choixvehicule', '*', null, 'idVehicule='.$id);
        return $this->db->getResult();
    }
    
    /**
     * Retourne les choixVehicule via id du Choix
     * @param int $id
     * @return array
     */
    public function getChoixByChoix($id){
        $this->db->select('choixvehicule', '*', null, 'idChoix='.$id);
        return $this->db->getResult();
    }
    
    /**
     * Retourne tout les choix qui sont associés à un Véhicule
     * @return array
     */
    public function getAllChoixVehicule(){
        $this->db->select('choixvehicule');
        return $this->db->getResult();
    }

    /**
     * Save un choixVehicule
     * @param \app\core\ChoixVehicule $choixVehicule
     * @return bool
     */
    public function save(ChoixVehicule $choixVehicule) {
        return $this->add($choixVehicule);
    }
    
    /**
     * Update choixVehicule
     * Non utiliser
     * @param \app\core\Vehicule $vehicule
     * @return bool
     */
    public function updateVehicule(ChoixVehicule $choixVehicule){
        return $this->updateBis($choixVehicule);
    }

}
