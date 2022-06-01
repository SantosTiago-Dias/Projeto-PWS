<?php
session_start();

class Auth
{
    public function checkLogin($username, $password)
    {
        $user = utilizadores::find_by_username([$username]);
        $pass=$user->password;
        $nome=$user->username;
        if($username == $nome && $password == $pass)
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['role'] = $user->role;
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

    public function getRole()
    {
        return $_SESSION['role'];
    }
}
