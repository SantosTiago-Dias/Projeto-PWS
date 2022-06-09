<?php
require_once './controllers/BaseController.php';

class LinhaFaturaController extends BaseController
{
    public function index()
    {
        $auth = new auth();



        $this->makeView('linhaFatura', 'create');

    }

    public function show($idFatura)
    {
        $auth = new Auth();
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte
        $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
        $linhaFatura=Linhafatura::find('all',['fatura_id'=>$idFatura]);

        if($auth->isLoggedIn())
        {
            $this->makeView('linhaFatura', 'show',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa]);
        }
        else
        {
            $this->makeView('linhaFatura', 'show',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa]);
        }

    }

    public function create($idFatura,$idProduto)
    {
        $auth = new Auth();
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte
        $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
        $linhaFatura=Linhafatura::find('all',['fatura_id'=>$idFatura]);

        if($auth->isLoggedIn() && $idProduto==true)
        {
            $idProduto=$_GET['idProduto'];

            $produto=Produto::find([$idProduto]);


            $this->makeView('linhaFatura', 'create',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa,'produto'=>$produto]);
        }
        else
        {
            $this->makeView('linhaFatura', 'create',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa]);
        }



    }

    public function store($idFatura,$idProduto)
    {
        //validar Fatura
        $quantidade=$_POST['quantidade'];
        $produto= Produto::find([$idProduto]);
        $res=$produto->stock-$quantidade;
        $valor=$quantidade*$_POST['preco'];
        $valor_Iva=($valor/100)*0.+$_POST['taxa'];
        $precoTotal=$valor+$valor_Iva;
        $values=array('quantidade'=>$quantidade,'valor'=>$valor,'valor_iva'=>$valor_Iva,'Fatura_id'=>$idFatura,'Produto_id'=>$idProduto,'status'=>1);

        $linhaFatura= new Linhafatura($values);
        if ($linhaFatura->is_valid()) {
            $produto->update_attributes(['stock'=>$res]);
            $linhaFatura->save();
            $this->redirectToRoute('linhaFatura', 'create',['idFatura'=>$idFatura]);
        } else {
            $this->makeView('fatura', 'create');
        }

        //redirect linha fatura create(idFatura)
    }

    public function edit($idFatura,$idProduto)
    {
        $auth = new Auth();
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte
        $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
        $linhaFatura=Linhafatura::find('all',['fatura_id'=>$idFatura]);

        if($auth->isLoggedIn() && $idProduto==true)
        {
            $idProduto=$_GET['idProduto'];

            $produto=Produto::find([$idProduto]);


            $this->makeView('linhaFatura', 'edit',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa,'produto'=>$produto]);
        }
        else
        {
            $this->makeView('linhaFatura', 'edit',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa]);
        }

    }

    public function update($id)
    {

    }

    public function selectProduto($idFatura,$rota)
    {


        $produtos=Produto::all();
        //var_dump($produtos->iva->taxa); buscar o valor a tabela id
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $this->makeView('linhaFatura', 'selectProduto',['fatura'=>$fatura,'produtos'=>$produtos,'rota'=>$rota]);
    }

}


