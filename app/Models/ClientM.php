<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class ClientM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='clients';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields= ['nom','prenom','date','sexe','telephone','email','adresse','code_postal','ville','langue','commentaire'];
    
    public function getAllClient()
    {
        $query = $this->db->query('SELECT * FROM Clients');
        return $query->getResult();
    }
    public function getAllClients()
    {
        $query = $this->db->query('SELECT s.genre,c.ville, l.lang_name,cl.* from sexe AS s  
        JOIN clients AS cl ON cl.idSexe = s.id
        JOIN langue AS l ON cl.idLangue = l.id
        JOIN city AS c ON cl.idCity = c.id');
        return $query->getResult();
    }
 
    public function getAllClientsById($id)
    {
        $query = $this->db->query('SELECT s.genre,c.ville, l.lang_name,cl.* from sexe AS s  
        JOIN clients AS cl ON cl.idSexe = s.id
        JOIN langue AS l ON cl.idLangue = l.id
        JOIN city AS c ON cl.idCity = c.id');
        
        return $query->getResult();
    }
    public  function get_client($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }
    public  function inserting($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query->getResult();
    }

    public function getAllClientByUsers() {
        $query = $this->db->query('SELECT s.genre,c.ville, l.lang_name, cl.* FROM `clients` AS cl 
         JOIN `tempo` AS t ON cl.id = t.client_id
         JOIN `users` AS user ON t.urser_id = user.id
         JOIN city AS c ON cl.idCity=c.id
         JOIN sexe AS s ON cl.idSexe=s.id
         JOIN langue AS l ON cl.idLangue=l.id');
        return $query->getResult(); 
    }
    
}
