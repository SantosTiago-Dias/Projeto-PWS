<?php
require_once './controllers/BaseController.php';

class LinhaFaturaController extends BaseController
{
    public function index()
    {
        $auth = new auth();


        $nome = $auth->getUsername();
        $role = $auth->getRole();
        $this->makeView('fatura', 'baseFatura', ['role' => $role, 'nome' => $nome]);

    }

    public function show()
    {


    }

    public function create($idFatura, $idProduct)
    {


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
}


