<?php
require_once './models/Auth.php';


class BaseController
{
    public function makeView($controllerPrefix,$viewName,array $params=[])
    {

        extract($params);
        $auth=new Auth();

        if ($auth->isLoggedIn())
        {
            $nome=$auth->getUsername();
            $role=$auth->getRole();
            require_once './views/layout/header_Back.php';
            require_once './views/' . $controllerPrefix . '/' . $viewName . '.php';

            require_once './views/layout/footer.php';
        }
        else
        {
            require_once './views/layout/header_Front.php';
            require_once './views/' . $controllerPrefix . '/' . $viewName . '.php';

            require_once './views/layout/footer.php';
        }

    }

    public function redirectToRoute($controllerPrefix, $action,array $params=[])
    {
        //extract($params);
        var_dump($params);


        if ($params != "")
        {
            header('Location: ./router.php?c=' . $controllerPrefix . '&a=' . $action .'&'.http_build_query($params, ' ', '&amp;'));
        }
        else
        {
            header('Location: ./router.php?c=' . $controllerPrefix . '&a=' . $action);
        }

    }



}