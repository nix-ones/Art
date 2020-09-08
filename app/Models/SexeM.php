<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class SexeM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='sexe';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields= ['nom'];
    
    public function getAllSexe()
    {
        $query = $this->db->query('SELECT * FROM sexe');
        return $query->getResult();
    }
    public function getSexe() {
        $query = $this->db->query( 'SELECT s.nom from sexe AS s JOIN clients AS cl ON cl.idSexe= s.id');
        return $query->getResult(); 
    }
}
