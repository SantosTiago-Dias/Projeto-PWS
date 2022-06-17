<?php
require_once './controllers/BaseController.php';
class ClienteController extends BaseController
{

    public function index()
    {

        $clientes= utilizadore::all(['role'=>'Cliente']);
        $auth=new Auth();
        if($auth->isLoggedIn())
        {
            $this->makeView('cliente', 'index',['cliente'=>$clientes]);
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

        $clientes =utilizadore::all(['role'=>'Cliente']);
        $auth=new Auth();
        if($auth->isLoggedIn())
        {
            $this->makeView('cliente', 'create', ['cliente'=>$clientes]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }


    }
    public function store()
    {
        $auth=new Auth();
        if($auth->isLoggedIn())
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
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }

    public function edit($id)
    {



        $cliente = utilizadore::Find([$id]);
        $auth=new Auth();
        if($auth->isLoggedIn())
        {
            $this->makeView('cliente', 'edit', ['cliente' => $cliente]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }



    }
    public function update($id)
    {
        $auth=new Auth();
        if($auth->isLoggedIn())
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
        else
        {
            $this->redirectToRoute('login', 'index');
        }


    }



}