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

    public function registerPage()
    {
        require_once('views/pages/register.php');
    }
    public function register()
    { // Action register for USER
        $username = $_GET['username'];
        $password = $_GET['password'];
        if (!User::duplicate($username)) { // Checking duplicate USER
            User::create($username, $password);
            header("Location: ?controller=pages&action=home&status=createUserSuccess");
        } else {
            header("Location: ?controller=pages&action=registerPage&status=duplicate");
        }
    }

}
?>