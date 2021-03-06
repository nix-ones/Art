<?php namespace App\Models;
use CodeIgniter\Model;
use http\Env\Request;

class EventsM extends Model
{
    protected $request;
    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    protected $DBGroup='default';
    protected $table='events';
    protected $primaryKey='id';
    protected $returnType='array';
    protected $allowedFields=['titre ','debut','fin'];

    public function getAllEvents()
    {
        return $this->findAll();
    }
    public  function inserting($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query->getResult();
    }
}