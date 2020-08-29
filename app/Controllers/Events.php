<?php namespace App\Controllers;
use App\Models\EventsM;
class Events extends BaseController
{   
    public function __construct()
    {
        parent::__construct();
        $mestache = new  EventsM();
    }
    public function index()
    {
        echo view('templates/header');
        echo view('pages/fullcalendar');
		echo view('templates/footer');
    }
    function load(){
        $mesClients = new  EventsM();
        $event_data['events'] = $mesdate->getAllTache();
        foreach($event_data->result_array() as $row)
    {
        $data[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'debut' => $row['debut'],
            'fin' => $row['fin']
        );
        }
    echo json_encode($data);
    }
}