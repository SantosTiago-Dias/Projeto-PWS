<?php
require_once './controllers/BaseController.php';

class LinhaFaturaController extends BaseController
{
    public function index()
    {
        $auth = new auth();



        $this->makeView('linhaFatura', 'create');

    }

    public function show()
    {


    }

    public function create($idProduto)
    {
        $auth = new Auth();
        if($auth->isLoggedIn())
        {
            $idProduto=$_GET['id'];
            $fatura=Fatura::last();
            $cliente=utilizadore::find([$fatura->cliente_id]);
            $empresa=Empresa::find([$fatura->empresa_id]);
            $produto=Produto::find([$idProduto]);

            $this->makeView('linhaFatura', 'create',['cliente'=>$cliente,'empresa'=>$empresa,'produto'=>$produto]);
        }
        else
        {
            $this->makeView('linhaFatura', 'create');
        }



    }

    public function store()
    {
        //validar Fatura

        //redirect linha fatura create(idFatura)
    }

    public function edit($idLinhaFatura)
    {

    }

    public function update($id)
    {

    }

    public function selectProduto()
    {
        $auth= new auth();
        $produtos=Produto::all();
        //var_dump($produtos->iva->taxa); buscar o valor a tabela id

        $this->makeView('linhaFatura', 'selectProduto',['produtos'=>$produtos]);
    }

}


