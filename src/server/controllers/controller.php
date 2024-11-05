<?php
    require_once __DIR__ . "/../interfaces/IAction.php";
    require_once __DIR__ . "/ActionRegister.php";
    require_once __DIR__ . "/ActionLogin.php";

    $action = null;
    switch($_POST["action"]){
        case "register":
            $action = new ActionRegister();
            break;
        case "login":
            $action = new ActionLogin();
            break;
        default:
            echo "esta acción no existe...";
            break;
    }

    if($action != null && $action instanceof IAction)
        $action->execute($_POST);

?>