<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class StatutM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='statut';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields= ['nom'];
    
    public function getAllStatut()
    {
        $query = $this->db->query('SELECT * FROM statut');
        return $query->getResult();
    }
}