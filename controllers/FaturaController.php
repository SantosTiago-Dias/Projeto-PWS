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


    public function selectCliente()
    {
        $auth= new auth();

        $clientes=Utilizadore::all(['role'=>'Cliente']);
        $this->makeView('fatura', 'selectClient',['clientes'=>$clientes]);
    }

    public function emitir($idFatura)
    {
        $fatura=Fatura::find([$idFatura]);
        $fatura->update_attributes(['status'=>1]);
        $_SESSION['status'] = "good";
        $_SESSION['message'] ="Fatura emitida com sucesso";
        $this->redirectToRoute('fatura', 'index');
    }

    public function anular($idFatura)
    {
        $fatura=Fatura::find([$idFatura]);
        $fatura->update_attributes(['status'=>null]);
        $_SESSION['status'] = "bad";
        $_SESSION['message'] ="Fatura anulada com sucesso";
        $this->redirectToRoute('fatura', 'index');
    }
}