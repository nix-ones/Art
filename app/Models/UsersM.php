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
    public function getAllUsers()
    {
        $query = $this->db->query('SELECT * FROM tempo');
        return $query->getResult(); 
    }
    
    public function getAllClientByUsers() {
        $query = $this->db->query('SELECT cl.* FROM `clients` AS cl 
         JOIN `tempo` AS t ON cl.id = t.client_id
         JOIN `users` AS user ON t.urser_id = user.id');
        return $query->getResult(); 
    }
}