<?php

require_once './controllers/BaseController.php';


class FaturaController extends BaseController
{


    public function index()
    {
        $auth= new auth();
        $faturas=Fatura::all();
        $this->makeView('fatura', 'baseFatura',['fatura'=>$faturas]);

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
        $cliente=utilizadore::find([$idClient]);
        date_default_timezone_set('Europe/Lisbon');
        $dt = date_create('now');
        $date = date_format($dt, 'm-d-Y H:i:s');
        $funcionario=Utilizadore::find(['username'=>$nome]);
        $values=array('dtaFatura'=> $date,'Cliente_id'=>$idClient,'Funcionario_id'=>$funcionario->id,'Empresa_id'=>1,'status'=>'1');
        $fatura= new Fatura($values);
        if ($fatura->is_valid()) {

            $fatura->save();
            $this->redirectToRoute('linhaFatura', 'create',['fatura'=>$fatura->id]);
        } else {
            $this->makeView('fatura', 'create');
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