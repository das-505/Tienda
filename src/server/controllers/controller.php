<?php
    require_once __DIR__ . "/../interfaces/IAction.php";
    require_once __DIR__ . "/ActionRegister.php";
    require_once __DIR__ . "/ActionLogin.php";

    $action = null;
    if (!isset($_POST["action"]))
        echo "no se ha indicado el action..";
    else
        switch ($_POST["action"]) {
            case 'register':
                $action = new ActionRegister();
                break;
            case 'login':
                $action = new ActionLogin();
                break;
            case 'logout':
                $_SESSION["logged_user"] = null;
                header('Location: ../../index.php');
                exit();
                break;            
            default:
                echo "NO existe este usuario";
                break;
        }
      
    if($action != null && $action instanceof IAction)
        $action->execute($_POST, $_SESSION);
?>