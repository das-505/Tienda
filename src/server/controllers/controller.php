<?php
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../actions/ActionRegister.php";
require_once __DIR__ . "/../actions/ActionLogin.php";
require_once __DIR__ . "/../actions/ActionInsertProduct.php";


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
        case 'insert_product':
            $action = new ActionInsertProduct();
            break;
        default:
            echo "NO existe este usuario";
            break;
    }

if ($action != null && $action instanceof IAction)
    $action->execute($_POST, $_SESSION, $_FILES);
?>