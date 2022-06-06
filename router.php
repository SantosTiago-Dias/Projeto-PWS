<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';
require_once './controllers/BackEndController.php';
require_once './controllers/EmpresaController.php';
require_once './controllers/FaturaController.php';
require_once './controllers/IvaController.php';
require_once './controllers/LinhaFaturaController.php';
require_once './controllers/ProductsController.php';

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

                    $controller->create();
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
                    $id=$_GET['id'];
                    $controller->create($id);
                    break;
                case "selectProdutos":
                    $controller->selectProduto();
                    break;
            }
            break;
        case "produtos":
            $controller = new ProductsController();
            switch ($a)
            {
                case "index":
                    $controller->index();
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