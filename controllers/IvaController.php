<?php
require_once './controllers/BaseController.php';
class IvaController extends BaseController
{
    public function index()
    {
        $auth= new Auth();
        if($auth->isLoggedIn())
        {
            $ivas = Iva::all();
            $this->makeView('iva', 'index', ['ivas'=>$ivas]);
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
            $ivas = Iva::all();

            $this->makeView('iva', 'create', ['ivas'=>$ivas]);
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
            $attributes = array('taxa' => $_POST['iva'], 'descricao' => $_POST['descricao'],'status'=>'1');
            $iva= new Iva($attributes);
            if ($iva->is_valid()) {

                $iva->save();
                //redirecionar para o index
                $this->redirectToRoute('iva', 'index');
            } else {
                $this->makeView('iva', 'create', ['iva' => $iva]);
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function edit($id)
    {
        $auth = new auth();
        if($auth->isLoggedIn()) {
            $iva = Iva::Find([$id]);

            $this->makeView('iva', 'edit', ['iva' => $iva]);
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
            $attributes = array('taxa' => $_POST['iva'], 'descricao' => $_POST['descricao']);
            $iva = Iva::Find([$id]);

            $iva->update_attributes($attributes);
            if ($iva->is_valid()) {
                $iva->save();
                //redirecionar para o index
                echo "aaa";
                $this->redirectToRoute('iva', 'index');
            } else {
                $this->makeView('iva', 'edit', ['iva' => $iva]);
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }


    }

    public function ative($id)
    {

        $attributes = array('status'=>1);
        $iva = Iva::Find([$id]);

        $iva->update_attributes($attributes);

        $iva->save();
        //redirecionar para o index
        $this->redirectToRoute('iva', 'index');
    }

    public function desativar($id)
    {

        $attributes = array('status'=>0);
        $iva = Iva::Find([$id]);

        $iva->update_attributes($attributes);
        $iva->save();
            //redirecionar para o index
       $this->redirectToRoute('iva', 'index');



    }
}