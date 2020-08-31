<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class TempoM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='tempo';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields=['client_id','urser_id'];
    
    public  function inserting($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query->getResult();
    }

}