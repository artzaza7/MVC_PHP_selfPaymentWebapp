<?php
class UsersController
{
    public function index()
    {
        if (!isset($_SESSION['encrypted_id'])) {
            require_once('views/pages/error.php');
        } else {
            $user_id_string = $_SESSION['encrypted_id'];
            $encrypted_id = null;
            $salt = null;

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
                $expenses_typeExpenses_list = ExpensesType_Expense::getExpensesByUserId($decrypted_id);
                require_once('views/users/index.php');
            }
        }
    }

    public function createExpenses()
    {
        $money = $_SESSION['money'];
        $user_id = $_SESSION['userId'];
        $type_expenses_id = $_SESSION['typeExpensesId'];
        $token = $_SESSION['encrypted_id'];
        Expenses::create($money, $user_id, $type_expenses_id);
        $decrypted_id = $user_id;
        $expenses_typeExpenses_list = ExpensesType_Expense::getExpensesByUserId($decrypted_id);
        unset($_SESSION['money']);
        unset($_SESSION['userId']);
        unset($_SESSION['typeExpensesId']);
        $_SESSION['status'] = "Create Expenses Success";
        header("Location: ?controller=users&action=index");
    }
}