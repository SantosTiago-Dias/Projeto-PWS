<?php

require_once './controllers/BaseController.php';


class FaturaController extends BaseController
{


    public function index()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $role=$auth->getRole();
            if ($role== "Cliente")
            {

                $id=$auth->getId();

                $faturas=Fatura::all(['cliente_id'=>$id]);

            }
            else
            {
                $faturas=Fatura::all();
            }

            $this->makeView('fatura', 'index',['funcao'=>$role,'faturas'=>$faturas]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }


        //falta fzr o resto
    }

    public function show($id)
    {

    }

    public function create($idcliente)
    {
        $auth= new Auth();
        if($auth->isLoggedIn()) {
            if ($auth->isLoggedIn() && $idcliente == true) {
                $id = $_GET['id'];
                $cliente = utilizadore::find([$id]);
                $this->makeView('fatura', 'create', ['cliente' => $cliente]);
            } else {
                $this->makeView('fatura', 'create');
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function store($idClient)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
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
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }


    public function selectCliente()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $clientes=Utilizadore::all(['role'=>'Cliente']);
            $this->makeView('fatura', 'selectClient',['clientes'=>$clientes]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function emitir($idFatura)
    {
        $auth = new Auth();
        if ($auth->isLoggedIn()) {
            $fatura = Fatura::find([$idFatura]);
            $fatura->update_attributes(['status' => 1]);
            $_SESSION['status'] = "good";
            $_SESSION['message'] = "Fatura emitida com sucesso";
            $this->redirectToRoute('fatura', 'index');
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }



    }

    public function anular($idFatura)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $fatura=Fatura::find([$idFatura]);
            $fatura->update_attributes(['status'=>null]);
            $_SESSION['status'] = "bad";
            $_SESSION['message'] ="Fatura anulada com sucesso";
            $this->redirectToRoute('fatura', 'index');
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }


    }

    public function search()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $value=$_POST['value_search'];
            if ($value!= null)
            {
                $utilizador=utilizadore::find(['username'=>$value]);
                $role=$auth->getRole();
                $faturas=Fatura::all(['cliente_id'=>$utilizador->id]);


                $this->makeView('fatura', 'index',['funcao'=>$role,'faturas'=>$faturas]);
            }
            else{
                $this->redirectToRoute('fatura', 'index');
            }

        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }


    }
}