<?php
class UsersController
{
    public function index()
    {
        $userIdString = null;
        $encrypted_id = null;
        $salt = null;
        if (isset($_GET['userId'])) {
            $userIdString = $_GET['userId'];
        }
        $delimiter = ".";
        $parts = explode($delimiter, $userIdString);
        $encrypted_id = $parts[0];
        $salt = $parts[1];
        if ($userIdString == null || $encrypted_id == null || $salt == null) {
            header("Location : ?controller=pages&action=error");
        } else {
            $decrypted_id_raw = base64_decode($encrypted_id);
            $decrypted_id = preg_replace(sprintf('/%s/', $salt), '', $decrypted_id_raw);
            require_once('views/users/index.php');
        }

    }
}