<?php
require_once './controllers/BaseController.php'; //quando erda de  outra class
//base Controller e como se fosse a class mae
require_once './models/Utilizadores.php';
require_once './models/Auth.php';


class BaseAuthController extends BaseController
{
    protected function loginFilter()
    {
        $auth = new Auth();

        if (!$auth->isLoggedIn()) {
            header('location: ./router.php' . INVALID_ACESS_ROUTE);
        }
    }
}