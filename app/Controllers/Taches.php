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
    public function update($id=null)
    {
        echo $id;
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
}
