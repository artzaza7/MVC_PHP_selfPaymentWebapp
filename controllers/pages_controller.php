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
            $_SESSION['status'] = 'createUserSuccess';
            header("Location: ?controller=pages&action=home");
        } else {
            $_SESSION['status'] = 'duplicate';
            header("Location: ?controller=pages&action=registerPage");
        }
    }

    public function login()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        if (User::hasUserByUsername($username)) {
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
                $_SESSION['encrypted_id'] = $encrypted_id . "." . $salt;
                header("Location: ?controller=users&action=index");
            } else {
                $_SESSION['status'] = "passwordIsInvalid";
                header("Location: ?controller=pages&action=home");
            }
        } else {
            $_SESSION['status'] = "notHasUser";
            header("Location: ?controller=pages&action=home");
        }
    }
}