<?php
class PagesController
{
    public function home()
    {
        require_once('views/pages/home.php');
    }
    public function error()
    {
        require_once('views/pages/error.php');
    }

    public function register()
    {
        $status = '';
        $username = 'Default';
        $password = 'Default';
        $confirmPassword = 'Default';

        require_once('views/pages/register.php');
    }

    public function registerCheckPassword()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $confirmPassword = $_GET['confirmPassword'];
        $status = '';
        if ($password != $confirmPassword) {
            $status = 'Something is wrong';
            require_once('views/pages/register.php');
        } else if ($username == '' || $password == '' || $confirmPassword == '') {
            require_once('views/pages/register.php');
        }


    }
}
?>