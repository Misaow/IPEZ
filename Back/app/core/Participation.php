<?php

namespace app\core;
/**
 * Description of Participation
 *
 * @author Damien LAUNAY
 */
class Participation {

    private $TClient_id;
    private $TEvent_id;
 
    
     /**
     *
     * @var array
     */
    
    private $donnees = array();
    
    
    /**
     * Constructeur de Participation
     * @param type $valeur
     */
    public function __construct($valeur = array()) {
        if (!empty($valeur))
            $this->init($valeur);
     
        $this->db = new \app\core\Database();
        $this->db->connect();
    }
    
    

    /**
     * Initialise les valeurs de Participation
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
     * Delete participation by Id
     * @param type $TClient_id
     * @param type $TEvent_id
     * @return type
     */
public function deleteParticipation($TClient_id,$TEvent_id) {
        
   return $this->db->delete('tparticipation', 'TClient_id='.$TClient_id.'AND $TEvent_id='.$TEvent_id);
        
    }
    
        public function addParticipation(Participation $participation){

        $req = $this->db->insert("tparticipation", $participation->getDonnees());
        return $req;
    }
    
    
    /**
     * Retourne liste des participation
     * @return type
     */
        public function getParticipation(){
        $this->db = new \app\core\Database();
        $this->db->select('tparticipation');
        return $this->db->getResult();
        
    }
    /**
     * Return Participation by id
     * @param type $id
     * @return type
     */
     public function getParticipationById($id){
        $this->db->select('tparticipation', '*', null, 'id='.$id);
        return $this->db->getResult();
        
    }
    
      /**
     * Set le Tableau $donnees pour l'insertion en base
     * @return \app\core\Choix
     */
    public function setDonnees() {
        $this->donnees = array(
            'TClient_id' => $this->getTClient_id(),
            'TEvent_id'=> $this->getTEvent_id()     
             
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
     * @return \app\core\Participation
     */
    public function setDonneesUp() {
        $this->donnees = array(
             'TClient_id' => $this->getTClient_id(),
             'TEvent_id'=> $this->getTEvent_id()      
        );
        return $this;
    }
    /**
     * retourne l id de la participation
     * @return type
     */
    public function getId() {
        return $this->id;
    }


        
    
    /**
     * 
     * @return type $TClient_id
     */
    public function getTClient_id() {
        return $this->TClient_id;
    }

    /**
     * 
     * @return type $TEvent_id
     */
    public function getTEvent_id() {
        return $this->TEvent_id;
    }

    /**
     * 
     * @param type $TClient_id
     */
    public function setTClient_id($TClient_id) {
        $this->TClient_id = $TClient_id;
    }

    /**
     * 
     * @param type $TEvent_id
     */
    public function setTEvent_id($TEvent_id) {
        $this->TEvent_id = $TEvent_id;
    }

    public function getListParticipant($TEvent_id) {
        
        $this->db = new \app\core\Database();
        $this->db->select('tclient,tparticipation, tevent', 'mail', null, 'tclient.id = tparticipation.TClient_id AND tevent.id= tparticipation.TEvent_id AND tparticipation.TEvent_id='.$TEvent_id);
        return $this->db->getResult();
    }
    public function getListParticipantByEvt($TEvent_id) {
        
        $this->db->select('tclient,tparticipation, tevent', '*', null, 'tclient.id = tparticipation.TClient_id AND tevent.id= tparticipation.TEvent_id AND tparticipation.TEvent_id='.$TEvent_id);
        return $this->db->getResult();
    }
    /**
     * Ecrit la liste des participants dans un fichie CSV
     * @param type $TEvent_id
     */
function WriteCsv($TEvent_id) {

// configuration de la base de données base de données
        $this->db = new \app\core\Database();
        $this->db->connect();
$nom_fichier = 'export.csv';

//format du CSV
$csv_terminated = "\n";
$csv_separator = ";";
$csv_enclosed = '"';
$csv_escaped = "\\";

// requête MySQL
$sql_query = 'SELECT tclient.nom, prenom, mail, tevent.nom FROM tclient,tparticipation, tevent WHERE tclient.id = tparticipation.TClient_id AND tevent.id= tparticipation.TEvent_id AND tparticipation.TEvent_id='.$TEvent_id;



// exécute la commande
$result = mysql_query($sql_query);
$fields_cnt = mysql_num_fields($result);

$schema_insert = '';

for ($i = 0; $i < $fields_cnt; $i++)
{
    $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;
} // fin for

$out = trim(substr($schema_insert, 0, -1));
$out .= $csv_terminated;

// Format des données
while ($row = mysql_fetch_array($result))
{
    $schema_insert = '';
    for ($j = 0; $j < $fields_cnt; $j++)
    {
if ($row[$j] == '0' || $row[$j] != '')
{

    if ($csv_enclosed == '')
    {
$schema_insert .= $row[$j];
    } else
    {
$schema_insert .= $csv_enclosed .
    str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
    }
} else
{
    $schema_insert .= '';
}

if ($j < $fields_cnt - 1)
{
    $schema_insert .= $csv_separator;
}
    } // fin for

    $out .= $schema_insert;
    $out .= $csv_terminated;
} // fin while

// Envoie au fureteur pour le téléchargement
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($out));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=" . $nom_fichier);
echo $out;
exit;
}
    
}
