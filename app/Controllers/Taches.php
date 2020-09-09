<?php namespace App\Controllers;
use App\Models\TacheM;
use App\Models\TempoM;
use App\Models\ClientM;
use App\Models\StatutM;
use App\Models\EventsM;
use CodeIgniter\Controller;
class Taches extends Controller
{
    public function __construct()
    {
   
        $db = \Config\Database::connect();
    }
    public function index()
    {
        $mestache = new  TacheM();
        $data['taches'] = $mestache->getAllTache();
       
        echo view('templates/header');
        echo view('pages/listeTache',$data);
		echo view('templates/footer');
    }
    public function deleteTache($id=null)
    {
        $model =  new TacheM();
        $model->delete($id);
        return redirect()->to(base_url()."/taches/index");
    }
    public function newtache()
    {
        helper('form');
        $mesClients = new  ClientM();
        $data['clients'] = $mesClients->getAllClient();

        $mesStatut = new  StatutM();
        $data['statuts'] = $mesStatut->getAllStatut();

        echo view('templates/header'); 
        echo view('pages/formTache',$data);
		echo view('templates/footer');
    }
    public function update( $idTache = null )
    {
        if(!empty($idTache)){

            $model =  new TacheM();

            $result= $model->where('id',$idTache)->findAll();

            if (count($result)>0) {
                
                $data['tache'] = $result;
                echo view('templates/header');
                echo view('pages/formTacheUpdate',$data);
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
    public function insnewtache()
    {
        $val= $this->validate([
            
            'description'=>'required|min_length[5]',
            'debut'=>'required',
            'fin'=>'required',
            'prix'=>'required',
            'idclient'=>'required',
            'titre'=>'required',
            
        ]);
        if (!$val) 
        {
           $this->newtache();
        }
            else {
            $request = \Config\Services::request();
            $session =  \Config\Services::session();        
            
            $mestaches = new  TacheM();
            $mesClients = new TempoM();
            $mesEvents = new EventsM();

            helper('form');

            $idclient = $request->getPost('idclient');
            $description = $request->getPost('description');
            $titre = $request->getPost('titre');
            $idStatut = $request->getPost('idStatut');
            $fin = $request->getPost('fin');
            $debut = $request->getPost('debut');
            $prix = $request->getPost('prix');
            $commentaire = $request->getPost('commentaire');

            $myNewUser = [
                
                'idclient'=> $idclient,
                'description'=> $description,
                'commentaire'=> $commentaire,
                'titre'=> $titre,
                'debut'=> $debut,
                'fin'=> $fin,
                'idStatut'=> $idStatut,
                'prix'=> $prix,
               
            ];

            $mesCli = [
                'client_id' => $idclient,
                'urser_id' =>  $session->get('id'),
            ];
            $mesEve=[
                'titre'=> $titre,
                'debut'=> $debut,
                'fin'=> $fin,
            ];

          
            $result = $mestaches->inserting($myNewUser);
            $result = $mesClients->inserting($mesCli);
            $result = $mesEvents->inserting($mesEve);

                
            if ($result) {
                echo ' pas ok';
            }
            else {
                return redirect()->to(site_url('taches/index'));
            }    
        }   
     }
     public function modifierTache()
     {
        $val= $this->validate([
           
           
            'description'=>'required',            
            'date'=>'required',
            'dure'=>'required',
            'statut'=>'required',
            'prix'=>'required',
            
        ]);

        if (!$val) 
        {
            $this->insnewtache();
        }

        else {

            helper('text');
            
            $request = \Config\Services::request();

            $id = $request->getPost('id');
            $idclient = $request->getPost('idclient');
            $commentaire = $request->getPost('commentaire');
            $description = $request->getPost('description');
            $date = $request->getPost('date');
            $dure = $request->getPost('dure');
            $prix = $request->getPost('prix');
            $statut = $request->getPost('statut');
    
            $updateTache = [
                
                'idclient'=> $idclient,
                'description'=> $description,
                'commentaire'=> $commentaire,
                'date'=> $date,
                'dure'=> $dure,
                'statut'=> $statut,
                'prix'=> $prix,
               
            ];

            $tache =  new TacheM();

            $resultat = $tache->update($id,$updateTache);

            if ($resultat) {
                return redirect()->to(site_url('taches/index'));
            }
            else {
                echo "NO";
            }
        } 
        
     }
}
