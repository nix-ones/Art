<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class TacheM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='taches';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields=['idclient ','description','titre','debut','fin','idStatut','commentaire','prix'];

    public function getAllTache()
    {
        $query = $this->db->query('SELECT m.nom_status, cl.nom, s.* from taches AS s 
        JOIN clients AS cl ON s.idclient = cl.id
        JOIN statut AS m ON s.idStatut = m.id');        
        return $query->getResult(); 
    }
    
    
    
    public  function get_taches($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }

    public  function inserting($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query->getResult();
    }
}
