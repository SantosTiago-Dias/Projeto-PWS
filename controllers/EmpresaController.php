<?php
require_once './controllers/BaseController.php';



class EmpresaController extends BaseController
{
    public function index()
    {
        $auth= new auth();
        $empresa = Empresa::all();
        $nome=$auth->getUsername();
        $role = $auth->getRole();
        if($auth->isLoggedIn())
        {
         $this->makeView('empresa', 'index',['empresas'=>$empresa,'nome'=>$nome,'role'=>$role]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function show($id)
    {
        $auth= new auth();
        $empresa = Empresa::find([$id]);

        $nome=$auth->getUsername();
        $role = $auth->getRole();

        if($auth->isLoggedIn())
        {
            $this->makeView('empresa', 'show',['empresas'=>$empresa,'nome'=>$nome,'role'=>$role]);
        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function edit($id)
    {
        $auth= new auth();
        $empresa = Empresa::find([$id]);

        $nome=$auth->getUsername();
        $role = $auth->getRole();
        if($auth->isLoggedIn())
        {
            $this->makeView('empresa', 'edit',['empresas'=>$empresa,'nome'=>$nome,'role'=>$role]);
        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $auth= new auth();
        $nome=$auth->getUsername();
        $role = $auth->getRole();
        $attributes = array('nome' => $_POST['nome'], 'email' => $_POST['email'], 'telefone' => $_POST['telefone'], 'nif' => $_POST['nif'], 'morada' => $_POST['morada'], 'codPostal' => $_POST['codPostal'], 'local' => $_POST['local'], 'capSocial' => $_POST['capSocial'], 'descricao' => $_POST['descricao']);
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute('empresa', 'index');
        } else {
            $this->makeView('empresa', 'edit',['empresas'=>$empresa,'nome'=>$nome,'role'=>$role]);
        }
    }


}