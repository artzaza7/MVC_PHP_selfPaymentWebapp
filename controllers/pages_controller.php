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

    public function login()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        if (User::hasUser($username)) {
            $user = User::getUserByUsername($username);
            $passwordHash = $user->password;
            $validPassword = password_verify($password, $passwordHash);
            if ($validPassword) {
                function generateRandomSalt($length = 10)
                {
                    return bin2hex(random_bytes($length));
                }

                $salt = generateRandomSalt();
                $encrypted_id = base64_encode($user->id . $salt);
                $keyword = generateRandomSalt();
                header("Location: ?controller=users&action=index&userId=" . $encrypted_id . $keyword . $salt . "&key=" . $keyword);
            } else {
                header("Location: ?controller=pages&action=home&status=passwordIsInvalid");
            }
        } else {
            header("Location: ?controller=pages&action=home&status=notHasUser");
        }
    }
}
