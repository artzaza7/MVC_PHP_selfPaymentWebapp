<?php
class UsersController
{
    public function index()
    {
        $user_id_string = null;
        $encrypted_id = null;
        $salt = null;
        if (isset($_GET['userId'])) {
            $user_id_string = $_GET['userId'];
        }
        $delimiter = ".";
        $parts = explode($delimiter, $user_id_string);
        if (count($parts) == 2) {
            $encrypted_id = $parts[0];
            $salt = $parts[1];
        }
        if ($user_id_string == null || $encrypted_id == null || $salt == null) {
            header("Location : ?controller=pages&action=error");
        } else {
            $decrypted_id_raw = base64_decode($encrypted_id);
            $decrypted_id = preg_replace(sprintf('/%s/', $salt), '', $decrypted_id_raw);
            $type_expenses_list = Type_expenses::getAllTypeExpenses();
            require_once('views/users/index.php');
        }
    }

    public function createExpenses(){
        $money = $_GET['money'];
        $user_id = $_GET['user_id'];
        $type_expenses_id = $_GET['type_expenses_id'];
        $token = $_GET['token'];
        Expenses::create($money, $user_id, $type_expenses_id);
        $decrypted_id = $user_id;
        require_once('views/users/index.php');
    }
}