<?php
class Expenses
{
    public $id;
    public $money;
    public $user_id;
    public $type_expenses_id;
    public $created_time;

    public function __construct($id, $money, $user_id, $type_expenses_id, $created_time)
    {
        $this->id = $id;
        $this->money = $money;
        $this->user_id = $user_id;
        $this->type_expenses_id = $type_expenses_id;
        $this->created_time = $created_time;
    }

    public static function create($money, $user_id, $type_expenses_id)
    {
        require("dbconnection_connect.php");
        $sql = "INSERT INTO expenses (money, user_id, type_expenses_id) values ('$money', '$user_id', '$type_expenses_id')";
        $result = $conn->query($sql);
        require("dbconnection_close.php");
        return "Create Expenses Success";
    }
}
?>