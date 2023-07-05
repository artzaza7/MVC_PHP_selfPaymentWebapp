<?php
    Class Type_expenses{
        public $id;
        public $name;

        public function __construct($id, $name){
            $this->id = $id;
            $this->name = $name;
        }

        public static function getAllTypeExpenses(){
            require("dbconnection_connect.php");
            $typeExpenseslist = [];
            $sql = "SELECT * FROM type_expenses";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $name = $row['name'];
                $typeExpenseslist[] = new Type_expenses($id, $name);
            }
            require("dbconnection_close.php");
            return $typeExpenseslist;

        }
    }
?>