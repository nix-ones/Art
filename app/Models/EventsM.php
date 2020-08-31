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
    protected $allowedFields=['title ','debut','fin'];

    public function getAllEvents()
    {
        return $this->findAll();
    }
    
}