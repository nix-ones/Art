<?php namespace App\Controllers;
use App\Models\UsersM;
class Users extends BaseController
{
    public function form()
    {
        
       echo view('pages/formregister');  
    }
    public function register()
    {
        $myvalues=$this->validate
            (
                [
                    'nom'=>'required|alpha',
                    'prenom'=>'required|alpha',
                    'sexe'=>'required',
                    'date'=>'required',
                    'password'=>'required|min_length[4]',
                    'email'=>'required|valid_email[users.email]',
                    'password'=>'required',
                    'passwordC'=>'required|matches[password]',
                ]
            );
            if(!$myvalues){
                $this->index();            
            }
            else {

                $session =  \Config\Services::session();
                $request = \Config\Services::request();
                $users =  new UsersM();

                $data['nom'] = $request->getPost('nom');
                $data['prenom'] = $request->getPost('prenom');
                $data['date'] = $request->getPost('date');
                $data['sexe'] = $request->getPost('sexe');
                $data['email'] = $request->getPost('email');
                $data['password'] = hash('md5',$request->getPost('password')) ;
    
                

                $checkEmailExiste = $users->where('email',$data['email'])->findAll();
                if(count($checkEmailExiste) > 0) {
                    echo "Mail existe";
                }
                else{
                   
                    $myNewUser = $users->insert($data);
                    
                    return redirect()->to(site_url('users/login'));

                }
            }      
         
    }
    public function login()
    {
        echo view('pages/formLogin');

    }
    public function connexion()
    {
        $request = \Config\Services::request();
        $session =  \Config\Services::session();

        $inputsValues = $this->validate(
            [
                'email' => 'required',
                'password'=> 'required',
            ]   
         );

         if(!$inputsValues) {
             $this->login();
         }
         else {
            $users =  new UsersM();
            helper('text');

            $data['email'] = $request->getPost('email');
            $data['password'] = hash('md5',$request->getPost('password')) ;

            $allusers= $users->where('email',$data['email'])->findall();
           if(count($allusers)>0)
           {
                if ($data['password'] == $allusers[0]['password']) {
                    $sessionDate['id'] = $allusers[0]['id'];
                    $sessionDate['nom'] = $allusers[0]['nom'];
                    $sessionDate['prenom'] = $allusers[0]['prenom'];
                    $sessionDate['email'] = $allusers[0]['email'];
                    $sessionDate['sexe'] = $allusers[0]['sexe'];
                    $sessionDate['date'] = $allusers[0]['date'];

                    $session->set($sessionDate);

                    if ($session->get('id')) {
                        return redirect()->to(site_url('events/calendrier'));

                    }
                    else {
                        return redirect()->to(site_url('user/login'));
                    }
                }
                else {
                    echo "NOT VALID";
                }
           }
           else {
            echo"ERREUR";
           }
         
        }
    }
    public function signuOut()
    {
        helper('form');
        $session =  \Config\Services::session();
        $session->destroy();
        return redirect()->to(site_url('/home'));
    }
    public function listeClient()
    {
        $session =  \Config\Services::session();        
        $checkUser =  $session->get('id');


        $mesUsers = new  UsersM();
        $data['users'] = $mesUsers->getAllClientByUsers();
        
      if ($checkUser) {
        echo view('templates/header');
        echo view('pages/listeTempon',$data);
		echo view('templates/footer');
      }
    }
}