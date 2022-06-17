<?php
require_once './controllers/BaseController.php';

class ProdutoController extends BaseController
{
    public function index()
    {

        //$produtos=Produto::all();
        $produtos=Produto::all();

        $this->makeView('produto', 'index',['produtos'=>$produtos]);

    }

    public function show()
    {

    }

    public function create()
    {
        $produtos = Produto::all();
        $ivas = Iva::all(['status'=>1]);

        $this->makeView('produto', 'create', ['ivas'=>$ivas,'produtos'=>$produtos]);

    }

    public function store()
    {
        $attributes = array('nome' => $_POST['nome'],'preco'=>$_POST['preco'],'stock' => $_POST['stock'],'iva_id' => $_POST['iva'],'status'=>'1');

        $produtos= new Produto($attributes);

        //var_dump($_POST);

        if ($produtos->is_valid()) {

            $produtos->save();
            //redirecionar para o index
            $this->redirectToRoute('produto', 'index');
        } else {
            $this->redirectToRoute('produto', 'create');
        }
    }

    public function edit($id)
    {
        $produto = Produto::Find([$id]);
        $ivas = Iva::all(['status'=>1]);

        $this->makeView('produto', 'edit', ['ivas'=>$ivas,'produto'=>$produto]);
    }

    public function update($id)
    {
        $attributes = array('nome' => $_POST['nome'],'preco'=>$_POST['preco'],'stock' => $_POST['stock'],'iva_id' => $_POST['iva'],'status'=>'1');

        $produtos = Produto::Find([$id]);

        //var_dump($_POST);
        $produtos->update_attributes($attributes);
        if ($produtos->is_valid()) {

        $produtos->save();
            //redirecionar para o index
            $this->redirectToRoute('produto', 'index');
        } else {
            $this->redirectToRoute('produto', 'create');
        }
    }

    public function ative($id)
    {

        $attributes = array('status'=>1);
        $produtos = Produto::Find([$id]);

        $produtos->update_attributes($attributes);

        $produtos->save();
        //redirecionar para o index
        $this->redirectToRoute('produto', 'index');
    }

    public function desativar($id)
    {

        $attributes = array('status'=>0);
        $produtos = Produto::Find([$id]);

        $produtos->update_attributes($attributes);
        $produtos->save();
        //redirecionar para o index
        $this->redirectToRoute('produto', 'index');



    }

    public function adicionarstock($id)

        {
            $produto = Produto::Find([$id]);
            $this->makeView('produto', 'adicionarstock', ['produto'=>$produto]);
        }


    public function guardarstock($id)
    {
        $produto = Produto::Find([$id]);
        $stock = $produto->stock + $_POST['nstock'];
        $produto->update_attributes(['stock'=>$stock]);
        $produto->save();
        //redirecionar para o index
        $this->redirectToRoute('produto', 'index');
        $this->makeView('produto', 'adicionarstock', ['produto'=>$produto]);
    }

}