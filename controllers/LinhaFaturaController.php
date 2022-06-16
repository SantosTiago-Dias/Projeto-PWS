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


            $this->makeView('linhaFatura', 'create',['linhafaturas'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa,'produto'=>$produto]);
        }
        else
        {
            $this->makeView('linhaFatura', 'create',['linhafaturas'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa]);
        }



    }

    public function store($idFatura,$idProduto)
    {
        //validar Fatura
        var_dump($_POST);
        $quantidade=$_POST['quantidade'];
        $produto= Produto::find([$idProduto]);//vai buscar o produto
        $res=$produto->stock-$quantidade;//calcula o stock que vai ficar no produto
        //iva
        $valoriva=$_POST['taxa']/100;
        $iva=$_POST['preco']*$valoriva;
        //preco com iva
        $precoiva=$_POST['preco']+$iva;
        $valor=$precoiva*$quantidade;
        //vai procurar a fatura
        $fatura=Fatura::find([$idFatura]);
        $values=array('quantidade'=>$quantidade,'valor'=>$_POST['preco'],'valor_iva'=>$precoiva,'fatura_id'=>$idFatura,'produto_id'=>$idProduto,'status'=>1);
        $exits= Linhafatura::exists(['fatura_id'=>$idFatura,'produto_id'=>$idProduto]);

        //calcula o iva e o valor
        $calcvalor=$fatura->valortotal+$valor;
        $calciva=$fatura->ivatotal+$iva;

        //verifca se a linha de fatura existe
        if ($exits == false)
        {
            $linhaFatura= new Linhafatura($values);
            if ($linhaFatura->is_valid()) {
                $produto->update_attributes(['stock'=>$res]);
                $fatura->update_attributes(['valortotal'=>$calcvalor,'ivatotal'=>$calciva]);
                var_dump($fatura);

                $linhaFatura->save();
                $this->redirectToRoute('linhaFatura', 'create',['idFatura'=>$idFatura]);
            }else {
                $this->makeView('fatura', 'create');
            }
        }
        else
        {

            $linhafaturaexistente=Linhafatura::find(['fatura_id'=>$idFatura,'produto_id'=>$idProduto]);
            $nproduto=$linhafaturaexistente->quantidade+$quantidade;
            $linhafaturaexistente->update_attributes(['quantidade'=>$nproduto]);
             if ($linhafaturaexistente->is_valid()) {
                 $produto->update_attributes(['stock'=>$res]);
                 $fatura->update_attributes(['valortotal'=>$calcvalor,'ivatotal'=>$calciva]);
                 $linhafaturaexistente->save();
                 $this->redirectToRoute('linhaFatura', 'create',['idFatura'=>$idFatura]);
             }else {
                 $this->makeView('fatura', 'create');
             }
            $linhafaturaexistente->save();


        }
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


            $this->makeView('linhaFatura', 'edit',['linhafaturas'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa,'produto'=>$produto]);
        }
        else
        {
            $this->makeView('linhaFatura', 'edit',['linhafaturas'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa]);
        }

    }

    public function update($idFatura,$idProduto)
    {
        var_dump($idProduto);
        $quantidade=$_POST['quantidade'];
        $linhafatura= Linhafatura::find(['fatura_id'=>$idFatura,'produto_id'=>$idProduto]);
        $produto= Produto::find([$idProduto]);//vai buscar o produto
        var_dump($linhafatura);
        var_dump($quantidade);
        var_dump($produto);
        if ($produto->stock > $quantidade)
        {
            $stock=0;
            if ($linhafatura->quantidade>$quantidade)
            {
                //numero que eu quero encomendar e inferior
                $diff=$linhafatura->quantidade-$quantidade;//diferença entre o valor que estava armazenado e oq vai ser armazenado

            }
            else
            {
                //numero que eu quero encomendar e superior
                $stock=$produto->stock-$quantidade;

            }

            //iva
            $valoriva=$_POST['taxa']/100;
            $iva=$_POST['preco']*$valoriva;
            //preco com iva
            $precoiva=$_POST['preco']+$iva;
            $valor=$precoiva*$quantidade;
            //vai procurar a fatura
            $fatura=Fatura::find([$idFatura]);
            $values=array('quantidade'=>$quantidade,'valor'=>$_POST['preco'],'valor_iva'=>$precoiva,'fatura_id'=>$idFatura,'produto_id'=>$idProduto,'status'=>1);

            //calcula o iva e o valor
            $calcvalor=$fatura->valortotal+$valor;
            $calciva=$fatura->ivatotal+$iva;

            $linhafaturaexistente=Linhafatura::find(['fatura_id'=>$idFatura,'produto_id'=>$idProduto]);
            $nproduto=$linhafaturaexistente->quantidade+$quantidade;
            $linhafaturaexistente->update_attributes(['quantidade'=>$nproduto]);
            if ($linhafaturaexistente->is_valid()) {
                $produto->update_attributes(['stock'=>$stock]);
                $fatura->update_attributes(['valortotal'=>$calcvalor,'ivatotal'=>$calciva]);
                $linhafaturaexistente->save();
                $this->redirectToRoute('linhaFatura', 'create',['idFatura'=>$idFatura]);
            }else {
                $this->makeView('fatura', 'index');
            }
        }
        else
        {
            echo "valor invalido";
        }
        die();
    }

    public function selectProduto($idFatura,$rota)
    {


        $produtos=Produto::all();
        //var_dump($produtos->iva->taxa); buscar o valor a tabela id
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $this->makeView('linhaFatura', 'selectProduto',['fatura'=>$fatura,'produtos'=>$produtos,'rota'=>$rota]);
    }

}


