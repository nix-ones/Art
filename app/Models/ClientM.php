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
    public  function get_client($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }
}
