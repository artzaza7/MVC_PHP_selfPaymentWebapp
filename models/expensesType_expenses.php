<?php
class ExpensesType_Expense{
    public $id;
    public $money;
    public $user_id;
    public $type_expenses_id;
    public $name;
    public $date;
    public $time;
    
    public function __construct($id, $money, $user_id, $type_expenses_id, $name, $date, $time){
        $this->id = $id;
        $this->money = $money;
        $this->user_id = $user_id;
        $this->type_expenses_id = $type_expenses_id;
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
    }
    public static function getExpensesByUserId($user_id)
    {
        require("dbconnection_connect.php");
        $expensesTypeExpensesList = [];
        $sql = "SELECT E.id, E.money, E.user_id, TE.id as type_expenses_id, TE.name, DATE(E.created_time) as date, TIME(E.created_time) as time FROM expenses as E INNER JOIN type_expenses as TE ON E.type_expenses_id = TE.id
        WHERE E.user_id = '" . $user_id . "'
        ORDER BY E.id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $money = $row['money'];
            $user_id = $row['user_id'];
            $type_expenses_id = $row['type_expenses_id'];
            $name = $row['name'];
            $date = $row['date'];
            $time = $row['time'];
            $expensesTypeExpensesList[] = new ExpensesType_Expense($id, $money, $user_id, $type_expenses_id, $name, $date, $time);
        }
        require("dbconnection_close.php");
        return $expensesTypeExpensesList;
    }
}
?>