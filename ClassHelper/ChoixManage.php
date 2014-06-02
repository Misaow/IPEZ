<?php

/** 
 * Class ChoixManage
 * 
 * @author Jonathan JUMARIE
 */

namespace app\core;
use app\core\Database;

class ChoixManage extends Database{
    
    /**
     * @var Database
     */
    protected $db;
    
    /**
     * Initialise la class ChoixManage
     * @param \app\core\Database $db
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Add un Choix, retourne si l'add à réussi ou non
     * @param \app\core\Choix $pointFort
     * @return bool
     */
    protected function add(Choix $pointFort){
        $req = $this->db->insert('choix', $pointFort->getDonnees());
        return $req;
    }

    /**
     * Update un choix, retourne si la requête à réussi
     * @param \app\core\Choix $pointFort
     * @return bool
     */
    protected function updateBis(Choix $pointFort){
        $pointFort->setDonneesUp();
        return $this->db->update('choix', $pointFort->getDonnees(), 'Id='.$pointFort->getId());
    }
    
    /**
     * Delete un choix, retourne si la requête à réussi
     * @param int $id
     * @return bool
     */
    public function deleteChoix($id){
        return $this->db->delete('choix', 'Id='.$id);
    }
    
    /**
     * Select un Choix
     * @param type $info
     * @return array
     */
    public function getChoix($info){
        if(is_int($info))
            $this->db->select('choix', '*', null, 'Id='.$info);
        else
            $this->db->select('choix', '*', null, "Valeur='".$info."'");
        return $this->db->getResult();
    }
    
    /**
     * Select tout les choix du Véhicule
     * @return array
     */
    public function getAllChoixVehiculeFutur(){
        $this->db->select('choix', '*', null, 'Type=2 or Type=3');
        return $this->db->getResult();
    }
    
    /**
     * Select tout les choix du Véhicule ctuel
     * @return array
     */
    public function getAllChoixVehiculeActuel(){
        $this->db->select('choix', '*', null, 'Type=1 or Type=3');
        return $this->db->getResult();
    }
    
    /**
     * Select tout les choix
     * @return array
     */
    public function getAllChoix(){
        $this->db->select('choix');
        return $this->db->getResult();
    }

    /**
     * Save Choix
     * @param \app\core\Choix $choix
     * @return bool
     */
    public function save(Choix $choix) {
        return $this->add($choix);
    }
    
    /**
     * Update Choix
     * @param \app\core\Choix $choix
     * @return bool
     */
    public function updateChoix(Choix $choix){
        return $this->updateBis($choix);
    }

}
