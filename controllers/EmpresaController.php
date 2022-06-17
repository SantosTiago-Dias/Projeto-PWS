<?php
require_once './controllers/BaseController.php';

class EmpresaController extends BaseController
{
    public function index()
    {
        $auth=new Auth();
        $empresa = Empresa::all();


        if($auth->isLoggedIn())
        {
         $this->makeView('empresa', 'index',['empresas'=>$empresa]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function show($id)
    {
        $auth=new Auth();
        $empresa = Empresa::find([$id]);




        if($auth->isLoggedIn())
        {
            $this->makeView('empresa', 'show',['empresas'=>$empresa]);
        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function edit($id)
    {

        $empresa = Empresa::find([$id]);


        $auth=new Auth();
        if($auth->isLoggedIn())
        {
            $this->makeView('empresa', 'edit',['empresas'=>$empresa]);
        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function update($id)
    {
        $empresa = Empresa::find([$id]);
        var_dump($empresa);
        if (!empty($_POST))
        {

            $attributes = array('nome' => $_POST['nome'], 'email' => $_POST['email'], 'telefone' => $_POST['telefone'], 'nif' => $_POST['nif'], 'morada' => $_POST['morada'], 'codpostal' => $_POST['codPostal'], 'local' => $_POST['local'], 'capSocial' => $_POST['capSocial'], 'descricao' => $_POST['descricao']);

            $empresa->update_attributes($attributes);
            if ($empresa->is_valid()) {
                $empresa->save();
                $this->redirectToRoute('empresa', 'index');
            } else {
                $this->makeView('empresa', 'edit',['empresas'=>$empresa]);
            }
        }
        else{
            $this->makeView('empresa', 'edit',['empresas'=>$empresa]);
        }

    }


}