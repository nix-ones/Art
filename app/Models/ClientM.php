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
    function get_album_data($id) {

        $this->db->select ( 'sexe.genre,city.ville, langue.lang_name,clients.*' ); 
        $this->db->from ( 'sexe' );
        $this->db->join ( 'clients', 'clients.idSexe = sexe.id' , 'left' );
        $this->db->join ( 'langue', 'clients.idLangue = langue.id' , 'left' );
        $this->db->join ( 'city', 'clients.idCity = city.id' , 'left' );
        $this->db->where ( 'clients.id', $id);
        $query = $this->db->get ();

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
        $query = $this->db->query('SELECT cl.* FROM `clients` AS cl 
         JOIN `tempo` AS t ON cl.id = t.client_id
         JOIN `users` AS user ON t.urser_id = user.id');
        return $query->getResult(); 
    }
    
}
