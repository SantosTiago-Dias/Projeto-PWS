<?php

require_once './controllers/BaseController.php';


class FaturaController extends BaseController
{


    public function index()
    {
        $auth= new auth();


        $nome=$auth->getUsername();
        $role=$auth->getRole();
        $this->makeView('fatura', 'baseFatura');

    }

    public function show($id)
    {


        if($auth->isLoggedIn())
        {
            $this->makeView('empresa', 'show',['empresas'=>$empresa]);
        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function create()
    {
        $auth= new auth();

        if($auth->isLoggedIn())
        {
            $this->makeView('fatura', 'create');
        }
        else
        {
            $this->makeView('fatura', 'baseFatura');
        }
    }

    public function store($idClient)
    {
        ActiveRecord\Connection::$datetime_format = 'Y-m-d H:i:s';// meter o tipo de data assim por causa do php active record
        $auth= new auth();
        $nome=$auth->getUsername();
        date_default_timezone_set('Europe/Lisbon');
        $dt = date_create('now');
        $date = date_format($dt, 'm-d-Y H:i:s');

        var_dump($date);
        $funcionario=utilizadores::find(['username'=>$nome]);
        $values=array('dtaFatura'=> $date,'Cliente_Id'=>$idClient,'Funcionario_ID'=>$funcionario->id,'status'=>'1');
        $fatura= new Fatura($values);
        if ($fatura->is_valid()) {

            $fatura->save();
            //redirecionar para o index
            $this->redirectToRoute('linhaFatura', 'create');
        } else {
            $this->makeView('fatura', 'create', ['iva' => $iva]);
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


        $nome=$auth->getUsername();
        $role=$auth->getRole();
        $clientes=utilizadores::all(['role'=>'Cliente']);
        $this->makeView('fatura', 'selectClient',['clientes'=>$clientes]);
    }

}