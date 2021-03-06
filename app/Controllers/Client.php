<?php namespace App\Controllers;
use App\Models\TacheM;
use App\Models\ClientM;
use App\Models\CityM;
use App\Models\LangueM;
use App\Models\SexeM;
use App\Models\TempoM;
class Client extends BaseController
{
   
    public function index()
    {
        $mesClients = new  ClientM();
        $session =  \Config\Services::session();        
        $checkUser =  $session->get('id');


        $data['clients'] = $mesClients->getAllClientByUsers();
        
        echo view('templates/header');
        echo view('pages/listeClient',$data);
		echo view('templates/footer');
    }
    public function newClient()
    {
        helper('form');
        
        $mesCity = new CityM();
        $data['citys'] = $mesCity->getAllCity();


        $mesLangue = new LangueM();
        $data['langues'] = $mesLangue->getAllLangue();

        $mesSexe = new SexeM();
        $data['sexes'] = $mesSexe->getAllSexe();


        echo view('templates/header'); 
        echo view('pages/formClient',$data);
		echo view('templates/footer'); 
    }
   public function validateClient() 
   {
    $val= $this->validate([
        'nom'=>'required|min_length[5]',
        'prenom'=>'required|min_length[5]',
        'email'=>'required|valid_email[clients.email]',
        'telephone'=>'required|min_length[3]|max_length[5]',
        'adresse'=>'required',
        'date'=>'required',
        'cp'=>'required',
        'ville'=>'required',
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
        $data['idSexe'] = $request->getPost('sexe');
        $data['email'] = $request->getPost('email');
        $data['adresse'] = $request->getPost('adresse');

        $data['idLangue'] = $request->getPost('langue');
        $data['telephone'] = $request->getPost('telephone');
        $data['idCity'] = $request->getPost('ville');
        $data['code_postal'] = $request->getPost('cp'); 
        $data['commentaire'] = $request->getPost('commentaire');
        $data['photo'] = $request->getPost('photo');



        $checkEmailExiste = $client->where('email',$data['email'])->findAll();

                if(count($checkEmailExiste) > 0) {
                    echo "Mail existe";
                }
                else{
                    $myNewUser = $client->inserting($data);
                    return redirect()->to(site_url('client/index'));
                }
        
        }
   }
   public function deleteClient($id=null)
    {
         $citys= new CityM();
         $sexes= new SexeM();
        $clients =  new ClientM();
        $temp= new TempoM();
        $tache = new TacheM();

        $cityId = $citys->where('id',$id)->findAll();
        $sexeId = $sexes->where('id',$id)->findAll();
        $clientId = $clients->where('id',$id)->findAll();
        $tempId = $temp->where('id',$id)->findAll();
        $tacheId = $tache->where('id',$id)->findAll();

        $result = $citys->delete($cityId);
        $result = $sexes->delete($sexeId);
        $result = $temp->delete($tempId);
        $result = $tache->delete($tacheId);
        $result = $clients->delete($clientId);
        
        return redirect()->to(base_url()."/client/index");
    }
    public function update( $idClient = null )
    {
       if(!empty($idClient)){

        $client =  new ClientM();

        $result= $client->where('id',$idClient)->findAll();

        if ( count ($result) > 0) {
            
            $data['client'] = $result;
            echo view('templates/header');
            echo view('pages/formUpdate',$data);
            echo view('templates/footer');
        }
        else {
            echo " NO";
        }

       }
       else {
           echo " Probleme id pas disponible";
       }

    }
    public function updateClient() 
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

                $id = $request->getPost('id');
                $nom = $request->getPost('nom');
                $prenom = $request->getPost('prenom');
                $date = $request->getPost('date');
                $sexe = $request->getPost('sexe');
                $email = $request->getPost('email');
                $adresse = $request->getPost('adresse');
        
                $langue = $request->getPost('langue');
                $telephone = $request->getPost('telephone');
                $ville = $request->getPost('ville');
                $code_postal = $request->getPost('cp'); 
                $commentaire = $request->getPost('commentaire');
                $updateClient = [
                    'nom'=> $nom,
                    'prenom'=> $prenom,
                    'date'=> $date,
                    'sexe'=> $sexe,
                    'email'=> $email,
                    'adresse'=> $adresse,
                    'langue'=> $langue,
                    'code_postal'=> $code_postal,
                    'ville'=> $ville,
                    'commentaire'=> $commentaire,
                    'telephone'=> $telephone,
                ];
                
                $request = \Config\Services::request();
                $client =  new ClientM();

                $resultat = $client->update($id,$updateClient);
                if ($resultat) {
                    echo " bien vue";
                }
                else {
                    echo "NO";
                }
            }
            return redirect()->to(site_url('client/index'));
    }
    public function infoclient($id=null)
    {
        if(!empty($id)){

            $client =  new ClientM();
            
            $result= $client->getAllClientsById($id);
            
            if ( count ($result) > 0) {
                
                $data['client'] = $result;
                echo view('templates/header');
                echo view('pages/detailClient',$data);
                echo view('templates/footer');
            }
        }
    }
}