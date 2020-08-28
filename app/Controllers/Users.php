<?php namespace App\Controllers;
class Users extends BaseController
{
    public function form()
    {
        
       echo view('pages/register');  
    }
    
}