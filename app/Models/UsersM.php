<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class UsersM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='users';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields=['nom','prenom','date','sexe','email','password'];
   
    public  function get_client($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }
}