<?php namespace App\Controllers;
use App\Models\EventsM;
class Events extends BaseController
{   
    
    public function calendrier()
    {
        $session =  \Config\Services::session();
       $checkUser =  $session->get('id');
       if ($checkUser) {
           echo " Bienvenue  :" . $session->get('nom');
       }
       else {
          echo " nom n'existe pas";
       }
    }
    
}