<?php
require_once './controllers/BaseController.php';



class LoginController extends BaseController
{
    public function index()
    {
        $auth = new Auth();

        if(!$auth->isLoggedIn())
        {
            $this->makeView('login', 'index');
        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }
    }

    public function login()
    {
        if(isset($_POST['name'], $_POST['password']))
        {
            $auth = new Auth();

            if($auth->checkLogin($_POST['name'], $_POST['password']))
            {
                $this->redirectToRoute('backend', 'index');
            }
            else
            {
                $this->redirectToRoute('login', 'index');
            }
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
        $this->redirectToRoute('login', 'index');
    }
}