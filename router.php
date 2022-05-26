<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/LoginController.php';


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

        case "plano":
            $controller = new PlanoController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "calcular":
                    $controller->calcular();
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