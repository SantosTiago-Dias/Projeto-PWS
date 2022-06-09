<?php
require_once './controllers/BaseController.php';
class IvaController extends BaseController
{
    public function index()
    {
        $auth = new auth();
        $ivas = Iva::all();

        $nome = $auth->getUsername();
        $role = $auth->getRole();
        $this->makeView('iva', 'index', ['role' => $role, 'nome' => $nome,'ivas'=>$ivas]);

    }

    public function show()
    {


    }

    public function create()
    {
        $auth = new auth();
        $ivas = Iva::all();

        $nome = $auth->getUsername();
        $role = $auth->getRole();
        $this->makeView('iva', 'create', ['role' => $role, 'nome' => $nome,'ivas'=>$ivas]);

    }

    public function store()
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

    public function edit($id)
    {
        $auth = new auth();
        $iva = Iva::Find([$id]);

        $nome = $auth->getUsername();
        $role = $auth->getRole();
        $this->makeView('iva', 'edit', ['role' => $role, 'nome' => $nome,'iva'=>$iva]);
    }

    public function update($id)
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