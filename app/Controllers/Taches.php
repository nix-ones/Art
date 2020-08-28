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
    
}
