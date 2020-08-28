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
    protected $returnType='array';
    protected $allowedFields=['idclient ','description','date','dure','statut','commentaire','prix',];

    public function getAllTache()
    {
        $query = $this->db->query('SELECT * FROM Taches');
        return $query->getResult(); 
    }   
    public  function get_taches($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }
}