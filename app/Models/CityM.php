<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class CityM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='city';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields= ['nom'];
    
    public function getAllCity()
    {
        $query = $this->db->query('SELECT * FROM city');
        return $query->getResult();
    }
}