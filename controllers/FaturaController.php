<?php

require_once './controllers/BaseController.php';


class FaturaController extends BaseController
{


    public function index()
    {


        $faturas=Fatura::all();
        //var_dump($fatura);
        $this->makeView('fatura', 'index',['faturas'=>$faturas]);

    }

    public function show($id)
    {

    }

    public function create($idcliente)
    {
        $auth= new auth();
        if($auth->isLoggedIn() && $idcliente==true)
        {
            $id=$_GET['id'];
            $cliente=utilizadore::find([$id]);
            $this->makeView('fatura', 'create',['cliente'=>$cliente]);
        }
        else
        {
            $this->makeView('fatura', 'create');
        }
    }

    public function store($idClient)
    {
        ActiveRecord\Connection::$datetime_format = 'Y-m-d H:i:s';// meter o tipo de data assim por causa do php active record
        $auth= new auth();
        $nome=$auth->getUsername();
        date_default_timezone_set('Europe/Lisbon');
        $dt = date_create('now');

        $funcionario=Utilizadore::find(['username'=>$nome]);
        $attributes=array('dtafatura'=> $dt,'cliente_id'=>$idClient,'utilizadore_id'=>$funcionario->id,'empresa_id'=>1,'status'=>'0');
        $fatura= new Fatura($attributes);

        if ($fatura->is_valid()) {

            $fatura->save();
            $this->redirectToRoute('linhaFatura', 'create',['idFatura'=>$fatura->id]);
        } else {

            $this->redirectToRoute('fatura', 'create');
        }
    }

    public function edit($id)
    {
        $auth= new auth();
        $empresa = Empresa::find([$id]);

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
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $auth= new auth();
        $nome=$auth->getUsername();
        $attributes = array('nome' => $_POST['nome'], 'email' => $_POST['email'], 'telefone' => $_POST['telefone'], 'nif' => $_POST['nif'], 'morada' => $_POST['morada'], 'codPostal' => $_POST['codPostal'], 'local' => $_POST['local'], 'capSocial' => $_POST['capSocial'], 'descricao' => $_POST['descricao']);
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute('empresa', 'index');
        } else {
            $this->makeView('empresa', 'edit',['empresas'=>$empresa]);
        }
    }

    public function selectCliente()
    {
        $auth= new auth();

        $clientes=Utilizadore::all(['role'=>'Cliente']);
        $this->makeView('fatura', 'selectClient',['clientes'=>$clientes]);
    }

}