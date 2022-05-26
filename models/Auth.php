<?php
session_start();

class Auth
{
    public function checkLogin($username, $password)
    {
        if($username == "Tiago" && $password == "1234")
        {
            $_SESSION['nome'] = $username;
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['nome']);
    }

    public function logout()
    {
        session_destroy();
    }

    public function getUsername()
    {
        return $_SESSION['nome'];
    }
}
