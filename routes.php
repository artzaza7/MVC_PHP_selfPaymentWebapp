<?php
$controllers = array('pages'=>['home', 'error', 'registerPage', 'register', 'login']
, 'users' => ['index', 'createExpenses']);

function call($controller, $action){
    require_once("controllers/".$controller."_controller.php");
    switch($controller){
        case "pages":
            require_once('models/user.php');
            $controller = new PagesController();
            break;
        case "users":
            require_once('models/user.php');
            require_once('models/type_expenses.php');
            require_once('models/expenses.php');
            require_once('models/expensesType_expenses.php');
            $controller = new UsersController();
            break;
    }
    $controller->{$action}();
}
if(array_key_exists($controller, $controllers)){
    if(in_array($action, $controllers[$controller])){
        call($controller, $action);
    }
    else{
        call('pages', 'error');
    }
}
else{
    call('pages', 'error');
}
?>