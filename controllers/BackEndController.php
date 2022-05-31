<?php

require_once './controllers/BaseController.php';



class BackEndController extends BaseController
{
    public function index()
    {
        $auth = new Auth();
        $nome=$auth->getUsername();
        if($auth->isLoggedIn())
        {
            $this->makeView('backend', 'index',['nome'=>$nome]);
        }
        else
        {
            $this->redirectToRoute('site', 'index');
        }
    }


}