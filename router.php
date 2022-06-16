<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/BackEndController.php';
require_once './controllers/EmpresaController.php';
require_once './controllers/FaturaController.php';
require_once './controllers/IvaController.php';
require_once './controllers/LinhaFaturaController.php';
require_once './controllers/ProdutoController.php';
require_once  './controllers/ClienteController.php';
require_once './controllers/FuncionarioController.php';

if(!isset($_GET['c'], $_GET['a']))
{
    // omissão, enviar para site
    $controller = new SiteController();
    $controller->index();
}
else
{
    // existem parametros definidos
    $c = $_GET['c'];// nome do controlador
    $a = $_GET['a'];// nome da ação do controlador

    switch ($c)
    {
        // exemplo caso o controlador seja a login ele abre o controlador od login e ve quais as funções que estao la dentro
        // que serias as rotas do laravel
        case "login":
            $controller = new LoginController();
            switch ($a)
            {
                // caso a action seja index ele chama a funcao do index
                case "index":
                    $controller->index();
                    break;

                case "login":
                    $controller->login();
                    break;

                case "logout":
                    $controller->logout();
            }
            break;

        case "backend":
            $controller = new BackEndController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "":
                    break;
            }
            break;

        case "iva":
            $controller = new IvaController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "create":
                    $controller->create();
                    break;
                case "store":
                    $controller->store();
                    break;
                case "edit":
                    $id=$_GET['id'];
                    $controller->edit($id);
                    break;
                case "update":
                    $id=$_GET['id'];
                    $controller->update($id);
                    break;

                case "ativar":
                    $id=$_GET['id'];
                    $controller->ative($id);
                    break;
                case "desativar":
                    $id=$_GET['id'];
                    $controller->desativar($id);
                    break;

                case "":
                    break;
            }
            break;

        case "empresa":
            $controller = new EmpresaController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;
                case "show":
                    $id=$_GET['id'];
                    $controller->show($id);
                    break;

                case "edit":
                    $id=$_GET['id'];
                    $controller->edit($id);
                    break;

                case "update":
                    $id=$_GET['id'];
                    $controller->update($id);
                    break;

                case "":
                    break;
            }
            break;
        case "fatura":

            $controller = new FaturaController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;
                case "create":
                    $id=isset($_GET['id']);
                    $controller->create($id);
                    break;

                case "store":
                    $id=$_GET['id'];
                    $controller->store($id);
                    break;

                case "update":
                    $id=$_GET['id'];
                    $controller->update($id);
                    break;

                case "selectCliente":
                    $controller->selectCliente();
                    break;
            }
            break;
        case "linhaFatura":
            $controller = new LinhaFaturaController();
            switch ($a)
            {
                case "create":
                    $idFatura=$_GET['idFatura'];
                    $idProduto=isset($_GET['idProduto']);

                    $controller->create($idFatura,$idProduto);
                    break;
                case "show":
                    $idFatura=$_GET['idFatura'];
                    $controller->show($idFatura);
                    break;
                case "selectProduto":
                    $idFatura=$_GET['idFatura'];
                    $rota=$_GET['rota'];
                    $controller->selectProduto($idFatura,$rota);
                    break;

                case "store":
                    $idFatura=$_GET['idFatura'];
                    $idProduto=$_GET['idProduto'];
                    $controller->store($idFatura,$idProduto);
                    break;
                case "edit":
                    $idFatura=$_GET['idFatura'];
                    $idProduto=isset($_GET['idProduto']);

                    $controller->edit($idFatura,$idProduto);
                    break;
                case "update":
                    $idFatura=$_GET['idFatura'];
                    $idProduto=$_GET['idProduto'];

                    $controller->update($idFatura,$idProduto);
                    break;
            }
            break;
        case "produto":
            $controller = new ProdutoController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

            }
            break;

        case "cliente":
            $controller = new ClienteController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "create":
                    $controller->create();
                    break;

                case "store":
                    $controller->store();
                    break;

                case "edit":
                    $idCliente=$_GET['id'];
                    $controller->edit($idCliente);
                    break;

                case "update":

                    $idCliente=$_GET['id'];
                    $controller->update($idCliente);

                    break;
            }
        case "funcionario":
            $controller = new FuncionarioController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "create":
                    $controller->create();
                    break;

                case "store":
                    $controller->store();
                    break;

                case "edit":
                    $idFuncinario=$_GET['id'];
                    $controller->edit($idFuncinario);
                    break;

                case "update":

                    $idFuncinario=$_GET['id'];
                    $controller->update($idFuncinario);

                    break;
            }


            break;
        case "site":
            $controller = new SiteController();
            $controller->index();
            break;



        default:
            $controller = new SiteController();
            $controller->index();
    }


}