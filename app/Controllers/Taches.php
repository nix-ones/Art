<?php namespace App\Controllers;
use App\Models\TacheM;
class Taches extends BaseController
{
   
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
        echo view('templates/header'); 
        echo view('pages/formTache');
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
            'date'=>'required',
            'dure'=>'required',
            'statut'=>'required',
            'prix'=>'required',
            
            
        ]);
        if (!$val) 
        {
           $this->newtache();
        }
            else {
            $request = \Config\Services::request();
            $mestache = new  TacheM();

            helper('text');
            $data['idclient'] = $request->getPost('idclient');
            $data['description'] = $request->getPost('description');
            $data['statut'] = $request->getPost('statut');
            $data['date'] = $request->getPost('date');
            $data['dure'] = $request->getPost('dure');
            $data['prix'] = $request->getPost('prix');
            $data['commentaire'] = $request->getPost('commentaire');

            $myNewUser = $mestache->insert($data);

            if ($myNewUser) {
                return redirect()->to(site_url('taches/index'));
            }
            else {
                echo "pas ok";
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
