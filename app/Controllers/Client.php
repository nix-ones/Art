<?php namespace App\Controllers;
use App\Models\ClientM;
class Client extends BaseController
{
   
    public function index()
    {
        $mesClients = new  ClientM();
        $data['clients'] = $mesClients->getAllClient();
        echo view('templates/header');
        echo view('pages/listeClient',$data);
		echo view('templates/footer');
    }
    public function newClient()
    {
        helper('form');
        echo view('templates/header'); 
        echo view('pages/formClient');
		echo view('templates/footer');
    }
   public function validateClient() 
   {
    $val= $this->validate([
        'nom'=>'required|min_length[5]',
        'prenom'=>'required|min_length[5]',
        'email'=>'required|valid_email[clients.email]',
        'telephone'=>'required|min_length[5]|max_length[10]',
        'adresse'=>'required',
        'date'=>'required',
        'cp'=>'required',
        'ville'=>'required|min_length[5]',
        'langue'=>'required',
        
    ]);
    if (!$val) 
    {
       $this->newClient();
    }

    else {
        $request = \Config\Services::request();
        $client =  new ClientM();
        helper('text');
        $data['nom'] = $request->getPost('nom');
        $data['prenom'] = $request->getPost('prenom');
        $data['date'] = $request->getPost('date');
        $data['sexe'] = $request->getPost('sexe');
        $data['email'] = $request->getPost('email');
        $data['adresse'] = $request->getPost('adresse');

        $data['langue'] = $request->getPost('langue');
        $data['telephone'] = $request->getPost('telephone');
        $data['ville'] = $request->getPost('ville');
        $data['code_postal'] = $request->getPost('cp'); 
        $data['commentaire'] = $request->getPost('commentaire');

        $checkEmailExiste = $client->where('email',$data['email'])->findAll();

                if(count($checkEmailExiste) > 0) {
                    echo "Mail existe";
                }
                else{
                    $myNewUser = $client->insert($data);
                    return redirect()->to(site_url('client/index'));
                }
        
    }
   }
   public function deleteClient($id=null)
    {
        $model =  new ClientM();
        $model->delete($id);
        return redirect()->to(base_url()."/client/index");
    }
}