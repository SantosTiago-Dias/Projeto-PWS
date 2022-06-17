<?php
require_once './controllers/BaseController.php';

class SiteController extends BaseController
{
    function index()
    {
        $auth = new Auth();

        if ($auth->isLoggedIn())
        {
            $this->redirectToRoute('fatura', 'index');
        }
        else{
            $this->makeView('site', 'index');
        }

    }
}