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

}
?>