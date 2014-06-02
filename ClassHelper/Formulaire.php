<?php

namespace app\core;

class Formulaire
{

    // Variables
    private $table = "formulaire"; // Valeur par défaut
    private $db;
    // Table Content
    private $id = "";
    private $nom = "";
    private $prenom = "";
    private $adresse = "";
    private $CP = "";
    private $ville = "";
    private $fixe = "";
    private $mobile = "";
    private $DateNaissance = "";
    private $Mail = "";
    private $VoitureP = "";
    private $MarqueP = "";
    private $TypeP = "";
    private $idvehicule1 = "";
    private $idvehicule2 = "";
    private $idvehicule3 = "";
    private $idchoix1 = "";
    private $idchoix2 = "";
    private $idchoix3 = "";
    private $idVehiculeActif ="";
    // Functions
    public function __construct($tab = null)
    {
        if (is_null($tab))
        {
            $this->table = $tab;
        }
    }

    public function getListForm()
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $this->db->select($this->table, "*");
        $res = $this->db->getResult();
        return $res; // return an array of Users ;
    }

    public function getFormByID($id)
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $this->db->select($this->table, "*", NULL, "id = " . $id);
        $res = $this->db->getResult();
        foreach ($res as $values)
        {//There is 1 value
            $this->setId($values["Id"]);
            $this->setNom($values["Nom"]);
            $this->setPrenom($values["Prenom"]);
            $this->setAdresse($values["Adresse"]);
            $this->setCP($values["CP"]);
            $this->setVille($values["Ville"]);
            $this->setFixe($values["Fixe"]);
            $this->setMobile($values["Mobile"]);
            $this->setDateNaissance($values["DateNaissance"]);
            $this->setMail($values["Mail"]);
            $this->setVoitureP($values["VoitureP"]);
            $this->setMarqueP($values["MarqueP"]);
            $this->setTypeP($values["TypeP"]);
            $this->setIdvehicule1($values["Idvehicule1"]);
            $this->setIdvehicule2($values["Idvehicule2"]);
            $this->setIdvehicule3($values["Idvehicule3"]);
            $this->setIdchoix1($values["Idchoix1"]);
            $this->setIdchoix2($values["Idchoix2"]);
            $this->setIdchoix3($values["Idchoix3"]);
            $this->setIdvehiculeactif($values["idVehiculeActif"]);
        }
    }

    public function delete($id)
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        if ($this->db->delete($this->table, "id = " . $id))
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function add()
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $result = $this->db->insert($this->table,
        array('Nom' => $this->nom,
        'Prenom' => $this->prenom,
        'Adresse' => $this->adresse,
        'CP' => $this->CP,
        'Ville' => $this->ville,
        'Fixe' => $this->fixe,
        'Mobile' => $this->mobile,
        'DateNaissance' => $this->DateNaissance,
        'Mail' => $this->Mail,
        'VoitureP' => $this->VoitureP,
        'MarqueP' => $this->MarqueP,
        'TypeP' => $this->TypeP,
        'Idvehicule1' => $this->idvehicule1,
        'Idvehicule2' => $this->idvehicule2,
        'Idvehicule3' => $this->idvehicule3,
        'Idchoix1' => $this->idchoix1,
        'Idchoix2' => $this->idchoix2,
        'Idchoix3' => $this->idchoix3,
        'idVehiculeActif' => $this->idVehiculeActif
        ));
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    /* public function edit($id)
      {

      } */

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCP()
    {
        return $this->CP;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getFixe()
    {
        return $this->fixe;
    }

    public function getMobile()
    {
        return $this->mobile;
    }
    public function getIdvehiculeactif()
    {
        return $this->idVehiculeActif;
    }

    public function setIdvehiculeactif($idvehiculeactif)
    {
        $this->idVehiculeActif = $idvehiculeactif;
        return $this;
    }

        public function getDateNaissance()
    {
        return $this->DateNaissance;
    }

    public function getMail()
    {
        return $this->Mail;
    }

    public function getVoitureP()
    {
        return $this->VoitureP;
    }

    public function getMarqueP()
    {
        return $this->MarqueP;
    }

    public function getTypeP()
    {
        return $this->TypeP;
    }

    public function getIdvehicule1()
    {
        return $this->idvehicule1;
    }

    public function getIdvehicule2()
    {
        return $this->idvehicule2;
    }

    public function getIdvehicule3()
    {
        return $this->idvehicule3;
    }

    public function getIdchoix1()
    {
        return $this->idchoix1;
    }

    public function getIdchoix2()
    {
        return $this->idchoix2;
    }

    public function getIdchoix3()
    {
        return $this->idchoix3;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function setCP($CP)
    {
        $this->CP = $CP;
        return $this;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    public function setFixe($fixe)
    {
        $this->fixe = $fixe;
        return $this;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    public function setDateNaissance($DateNaissance)
    {
        $this->DateNaissance = $DateNaissance;
        return $this;
    }

    public function setMail($Mail)
    {
        $this->Mail = $Mail;
        return $this;
    }

    public function setVoitureP($VoitureP)
    {
        $this->VoitureP = $VoitureP;
        return $this;
    }

    public function setMarqueP($MarqueP)
    {
        $this->MarqueP = $MarqueP;
        return $this;
    }

    public function setTypeP($TypeP)
    {
        $this->TypeP = $TypeP;
        return $this;
    }

    public function setIdvehicule1($idvehicule1)
    {
        $this->idvehicule1 = $idvehicule1;
        return $this;
    }

    public function setIdvehicule2($idvehicule2)
    {
        $this->idvehicule2 = $idvehicule2;
        return $this;
    }

    public function setIdvehicule3($idvehicule3)
    {
        $this->idvehicule3 = $idvehicule3;
        return $this;
    }

    public function setIdchoix1($idchoix1)
    {
        $this->idchoix1 = $idchoix1;
        return $this;
    }

    public function setIdchoix2($idchoix2)
    {
        $this->idchoix2 = $idchoix2;
        return $this;
    }

    public function setIdchoix3($idchoix3)
    {
        $this->idchoix3 = $idchoix3;
        return $this;
    }

}
