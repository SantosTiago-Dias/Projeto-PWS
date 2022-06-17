<?php
require_once './controllers/BaseController.php';

class ProdutoController extends BaseController
{
    public function index()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $produtos=Produto::all();
            $this->makeView('produto', 'index',['produtos'=>$produtos]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function show()
    {

    }

    public function create()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $produtos = Produto::all();
            $ivas = Iva::all(['status'=>1]);

            $this->makeView('produto', 'create', ['ivas'=>$ivas,'produtos'=>$produtos]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }

    }

    public function store()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $attributes = array('nome' => $_POST['nome'],'preco'=>$_POST['preco'],'stock' => $_POST['stock'],'iva_id' => $_POST['iva'],'status'=>'1');

            $produtos= new Produto($attributes);

            if ($produtos->is_valid()) {

                $produtos->save();
                //redirecionar para o index
                $this->redirectToRoute('produto', 'index');
            } else {
                $this->redirectToRoute('produto', 'create');
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function edit($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $produto = Produto::Find([$id]);
            $ivas = Iva::all(['status'=>1]);

            $this->makeView('produto', 'edit', ['ivas'=>$ivas,'produto'=>$produto]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function update($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
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
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function ative($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $attributes = array('status'=>1);
            $produtos = Produto::Find([$id]);

            $produtos->update_attributes($attributes);

            $produtos->save();
            //redirecionar para o index
            $this->redirectToRoute('produto', 'index');
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function desativar($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $attributes = array('status'=>0);
            $produtos = Produto::Find([$id]);

            $produtos->update_attributes($attributes);
            $produtos->save();
            //redirecionar para o index
            $this->redirectToRoute('produto', 'index');
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }



    }

    public function adicionarstock($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $produto = Produto::Find([$id]);
            $this->makeView('produto', 'adicionarstock', ['produto'=>$produto]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }


    public function guardarstock($id)
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $produto = Produto::Find([$id]);
            $stock = $produto->stock + $_POST['nstock'];
            $produto->update_attributes(['stock'=>$stock]);
            $produto->save();
            //redirecionar para o index
            $this->redirectToRoute('produto', 'index');
            $this->makeView('produto', 'adicionarstock', ['produto'=>$produto]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

}