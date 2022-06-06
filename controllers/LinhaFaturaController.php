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

    public function create($idProduct)
    {
        $produto=Produtos::find([$idProduct]);
        //$idfatura=Fatura::last();
        //var_dump($idfatura);
        $this->makeView('linhaFatura', 'create',['produto'=>$produto]);

    }

    public function store($idFatura)
    {
        //validar Fatura

        //redirect linha fatura create(idFatura)
    }

    public function edit($idLinhaFatura)
    {
        $auth = new auth();
        $empresa = Empresa::find([$id]);

        $nome = $auth->getUsername();

        if ($auth->isLoggedIn()) {
            $this->makeView('empresa', 'edit', ['empresas' => $empresa, 'nome' => $nome]);
        } else {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $auth = new auth();
        $nome = $auth->getUsername();
        $attributes = array('nome' => $_POST['nome'], 'email' => $_POST['email'], 'telefone' => $_POST['telefone'], 'nif' => $_POST['nif'], 'morada' => $_POST['morada'], 'codPostal' => $_POST['codPostal'], 'local' => $_POST['local'], 'capSocial' => $_POST['capSocial'], 'descricao' => $_POST['descricao']);
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute('empresa', 'index');
        } else {
            $this->makeView('empresa', 'edit', ['empresas' => $empresa, 'nome' => $nome]);
        }
    }

    public function selectProduto()
    {
        $auth= new auth();
        $produtos=Produtos::all();
        $this->makeView('linhaFatura', 'selectProduto',['produtos'=>$produtos]);
    }

}


