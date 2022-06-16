<?php
require_once './controllers/BaseController.php';

class FuncionarioController extends BaseController
{
    public function index()
    {
        $auth = new auth();

        $funcionarios= utilizadore::all(['role'=>'Funcionario']);
        $this->makeView('funcionario', 'index',['funcionarios'=>$funcionarios]);

    }
    public function show()
    {


    }
    public function create()
    {
        $auth = new auth();
        $funcionarios =utilizadore::all(['role'=>'Funcionario']);

        $this->makeView('funcionario', 'create', ['funcionarios'=>$funcionarios]);

    }
    public function store()
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

    public function edit($id)
    {
        $auth = new auth();
        $funcionario = utilizadore::Find([$id]);

        $nome = $auth->getUsername();

        $this->makeView('funcionario', 'edit', ['funcionario' => $funcionario]);


    }
    public function update($id)
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














}