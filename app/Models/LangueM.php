<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class LangueM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='langue';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields= ['nom'];
    
    public function getAllLangue()
    {
        $query = $this->db->query('SELECT * FROM langue');
        return $query->getResult();
    }
}