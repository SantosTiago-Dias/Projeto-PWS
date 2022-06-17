<?php
require_once './controllers/BaseController.php';

class LinhaFaturaController extends BaseController
{
    public function index()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {

            $this->makeView('linhaFatura', 'create');
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }

    public function show($idFatura)
    {
        $auth = new Auth();
        if($auth->isLoggedIn())
        {
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte
        $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
        $linhaFatura=Linhafatura::find('all',['fatura_id'=>$idFatura]);
        $role=$auth->getRole();

            $this->makeView('linhaFatura', 'show',['linhafatura'=>$linhaFatura,'fatura'=>$fatura,'cliente'=>$cliente,'empresa'=>$empresa,'funcao'=>$role]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }

    public function create($idFatura,$idProduto)
    {
        $auth = new Auth();
        if($auth->isLoggedIn())
        {
            $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura

            $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte

            $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
            $linhaFatura=Linhafatura::find('all',['fatura_id'=>$idFatura]);
            if ($idProduto == true)
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
        else
        {
            $this->redirectToRoute('login', 'index');
        }



    }

    public function store($idFatura,$idProduto,$rota)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
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
                    $this->redirectToRoute('linhaFatura', $rota,['idFatura'=>$idFatura]);
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

                     $this->redirectToRoute('linhaFatura', $rota,['idFatura'=>$idFatura]);
                 }else {
                     $this->makeView('fatura', 'create');
                 }
                $linhafaturaexistente->save();


            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function edit($idFatura,$idProduto)
    {
        $auth = new Auth();
        if($auth->isLoggedIn() )
        {
        $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
        $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte
        $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
        $linhaFatura=Linhafatura::find('all',['fatura_id'=>$idFatura]);

            if ($idProduto == true)
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
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }

    public function update($idFatura,$idProduto)
    {
        $aux_valor_total=0;//serve para guardar o valor total
        $aux_iva=0;//serve para guardar o iva
        var_dump($idProduto);
        $quantidade=$_POST['quantidade'];
        $linhafatura= Linhafatura::find(['fatura_id'=>$idFatura,'produto_id'=>$idProduto]);
        $produto= Produto::find([$idProduto]);//vai buscar o produto
        if ($produto->stock > $quantidade)
        {
            $stock=0;
            if ($linhafatura->quantidade<$quantidade)
            {

                //numero que eu quero encomendar e inferior
                $aux=$linhafatura->quantidade-$quantidade;//diferença entre o valor que estava armazenado e oq vai ser armazenado
                $stock=$produto->stock+$aux;
            }
            else
            {

                //numero que eu quero encomendar e superior
                $stock=$produto->stock-$quantidade;

                $produto->update_attributes(['stock'=>$stock]);//mudar o stock para o produto atual

            }

            $valoriva=$_POST['taxa']/100;
            $iva=$_POST['preco']*$valoriva;
            //preco com iva
            $precoiva=$_POST['preco']+$iva;
            $valor=$precoiva*$quantidade;

            $fatura=Fatura::find([$idFatura]);
            $cliente=utilizadore::find([$fatura->cliente_id]);//dados do clinte
            $empresa=Empresa::find([$fatura->empresa_id]);//dados da empresa
            $values=array('quantidade'=>$quantidade,'valor'=>$_POST['preco'],'valor_iva'=>$precoiva,'fatura_id'=>$idFatura,'produto_id'=>$idProduto,'status'=>1);

            //calcula o valor
            //vai buscar quantas linhas pertencem a esta fatura
            $linhasfaturas=Linhafatura::find('all',['fatura_id'=>$idFatura]);
            foreach ($linhasfaturas as $linhasfatura){
                $aux_valor_total+=$linhasfatura->valor;
            }
            var_dump($aux_valor_total);
            //calcula o iva

            foreach ($linhasfaturas as $linhasfatura){
                $aux_iva+=$linhasfatura->valor;
            }
            $linhafatura->update_attributes($values);
            if ($linhafatura->is_valid()) {
                $produto->update_attributes(['stock'=>$stock]);
                $fatura->update_attributes(['valortotal'=>$aux_valor_total,'ivatotal'=>$aux_iva]);
                $linhafatura->save();
                $this->redirectToRoute('linhaFatura', 'edit',['idFatura'=>$idFatura]);
            }else {
                $this->redirectToRoute('fatura', 'index');
            }

        }
        else
        {
            echo "valor invalido";

        }
    }

    public function delete($idFatura,$idProduto)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {

            $linhafatura= Linhafatura::find(['fatura_id'=>$idFatura,'produto_id'=>$idProduto]);
            $linhafatura->delete();
            //calcula o valor
            //vai buscar quantas linhas pertencem a esta fatura
            $linhasfaturas=Linhafatura::find('all',['fatura_id'=>$idFatura]);
            foreach ($linhasfaturas as $linhasfatura){
                $aux_valor_total+=$linhasfatura->valor;
            }
            var_dump($aux_valor_total);
            //calcula o iva

            foreach ($linhasfaturas as $linhasfatura){
                $aux_iva+=$linhasfatura->valor;
            }
            $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura
            $fatura->update_attributes(['valortotal'=>$aux_valor_total,'ivatotal'=>$aux_iva]);
            $linhafatura->save();

            $this->redirectToRoute('linhaFatura', 'edit',['idFatura'=>$idFatura]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function selectProduto($idFatura,$rota)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {

            $produtos=Produto::all(['status'=>1]);

            $fatura=Fatura::find([$idFatura]);// vai buscar os dados da fatura

            $this->makeView('linhaFatura', 'selectProduto',['fatura'=>$fatura,'produtos'=>$produtos,'rota'=>$rota]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }


    }


}


