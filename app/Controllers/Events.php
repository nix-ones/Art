<?php namespace App\Controllers;
use App\Models\EventsM;
class Events extends BaseController
{   
    
    public function calendrier()
    {
        $mesEvenvts = new  EventsM();
        $data['evs'] = $mesEvenvts->getAllEvents();
        $session =  \Config\Services::session();
        
       $checkUser =  $session->get('id');
       if ($checkUser) {

        $nom = $session->get('nom');
         
           echo '<h1>Bienvenue </h1>' .$nom;
           
           echo view('pages/fullcalendar',$data);
       }
       else {
          echo " nom n'existe pas";
       }
    }
}