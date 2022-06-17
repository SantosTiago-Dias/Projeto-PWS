<?php
require_once './controllers/BaseController.php';

class FuncionarioController extends BaseController
{
    public function index()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $funcionarios= utilizadore::all(['role'=>'Funcionario']);
            $this->makeView('funcionario', 'index',['funcionarios'=>$funcionarios]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }
    public function show()
    {


    }
    public function create()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $funcionarios =utilizadore::all(['role'=>'Funcionario']);

            $this->makeView('funcionario', 'create', ['funcionarios'=>$funcionarios]);

        }
        else
        {
        $this->redirectToRoute('login', 'index');
        }

    }
    public function store()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $attributes = array('username' => $_POST['username'],'password'=>$_POST['password'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'nif'=>$_POST['nif'],
                'morada'=>$_POST['morada'],'localidade'=>$_POST['localidade'],'codPostal'=>$_POST['codPostal'],'status'=>'1','empresa_id'=>'1','role' => 'Funcionario');

            $funcionario= new utilizadore($attributes);


            if ($funcionario->is_valid()) {

                $funcionario->save();
                //redirecionar para o index
                $this->redirectToRoute('funcionario', 'index');
            } else {
                $this->makeView('$funcionario', 'create', ['funcionario' => $funcionario]);
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function edit($id)
    {
        $auth = new auth();
        if($auth->isLoggedIn())
        {
            $funcionario = utilizadore::Find([$id]);
            $nome = $auth->getUsername();
            $this->makeView('funcionario', 'edit', ['funcionario' => $funcionario]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }
    public function update($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $attributes = array('username' => $_POST['username'],'password'=>$_POST['password'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'nif'=>$_POST['nif'],
                'morada'=>$_POST['morada'],'localidade'=>$_POST['localidade'],'codPostal'=>$_POST['codPostal'],'status'=>'1','empresa_id'=>'1','role' => 'Funcionario');

            $funcionario = utilizadore::Find([$id]);

            $funcionario->update_attributes($attributes);



            if ($funcionario->is_valid()) {
                $funcionario->save();
                //redirecionar para o index
                echo "aaa";
                $this->redirectToRoute('funcionario', 'index');
            } else {
                $this->makeView('funcionario', 'edit', ['funcionario' => $funcionario]);
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }














}