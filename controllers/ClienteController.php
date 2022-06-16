<?php
require_once './controllers/BaseController.php';
class ClienteController extends BaseController
{
    public function index()
    {
        $auth = new auth();
        $clientes= utilizadore::all(['role'=>'Cliente']);



        $this->makeView('cliente', 'index',['cliente'=>$clientes]);

    }

    public function show()
    {


    }
    public function create()
    {
        $auth = new auth();
        $clientes =utilizadore::all(['role'=>'Cliente']);

        $this->makeView('cliente', 'create', ['cliente'=>$clientes]);

    }
    public function store()
    {
        $attributes = array('username' => $_POST['username'],'password'=>$_POST['password'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'nif'=>$_POST['nif'],
            'morada'=>$_POST['morada'],'localidade'=>$_POST['localidade'],'codPostal'=>$_POST['codPostal'],'status'=>'1','empresa_id'=>'1','role' => 'Cliente');

        $cliente= new utilizadore($attributes);


        if ($cliente->is_valid()) {

            $cliente->save();
            //redirecionar para o index
            $this->redirectToRoute('cliente', 'index');
        } else {
            $this->makeView('cliente', 'create', ['cliente' => $cliente]);
        }
    }

    public function edit($id)
    {
        $auth = new auth();
        $cliente = utilizadore::Find([$id]);

        $nome = $auth->getUsername();

        $this->makeView('cliente', 'edit', ['cliente' => $cliente]);


    }
    public function update($id)
    {

        $attributes = array('username' => $_POST['username'],'password'=>$_POST['password'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'nif'=>$_POST['nif'],
            'morada'=>$_POST['morada'],'localidade'=>$_POST['localidade'],'codPostal'=>$_POST['codPostal'],'status'=>'1','empresa_id'=>'1','role' => 'Cliente');

        $cliente = utilizadore::Find([$id]);

        $cliente->update_attributes($attributes);



        if ($cliente->is_valid()) {
            $cliente->save();
            //redirecionar para o index
            echo "aaa";
            $this->redirectToRoute('cliente', 'index');
        } else {
            $this->makeView('cliente', 'edit', ['cliente' => $cliente]);
        }
    }



}