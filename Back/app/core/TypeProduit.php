<?php

namespace app\core;
/**
 * Description of TypeProduit
 *
 * @author Ayile Delageot
 */
class TypeProduit {
    
    private $id;
    private $nom;
    private $description;
    
    /**
     *
     * @var array
     */
    
    private $donnees = array();

    /**
     * Constructeur du typeproduit
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
    }
    
    

    /**
     * Initialise les valeurs du typeProduit
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


}
