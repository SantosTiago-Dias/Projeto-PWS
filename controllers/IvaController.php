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

    }

    public function update($id)
    {

    }
}