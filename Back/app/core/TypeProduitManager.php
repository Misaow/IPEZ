<?php

/**
 * Description of TypeProduitManager
 *
 * @author Ayile Delageot
 */

namespace app\core;

class TypeProduitManager extends Database  {
    
   
    /**
     * @var Database
     */
    protected $db;
    
    /**
     * Initialise la class TypeProduitManager
     * @param \app\core\Database $db
     */
    
    public function __construct(Database $db) {
        $this->db = $db;
    }
    
    
    protected function add(TypeProduit $typeProduit)
    
    {
       $req = $this->db->insert('ttypeproduit', $typeProduit->getDonnees());
        return $req;
        
    }
    
    protected function updateBis(TypeProduit $typeproduit) {
       $typeproduit->setDonneesUp();
       return $this->db->update('ttypeproduit', $typeproduit->getDonnees(), 'Id='.$typeproduit->getId());

    }
    protected function updateTypeProduit(TypeProduit $typeproduit){
       
        return( $this->updateBis($typeproduit));
    }
    
        /**
     * Delete un typeproduit, retourne  si la requête à réussi
     * @param int $id
     * @return bool
     */
    public function deleteProduit($id)
    {
        return $this->db->delete('ttypeproduit', 'Id='.$id);
    }
    
    
    
    
}

