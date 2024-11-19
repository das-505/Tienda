<?php
require_once __DIR__ . "/../daos/DatabaseController.php";
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../actions/ActionRegister.php";
require_once __DIR__ . "/../actions/ActionLogin.php";
require_once __DIR__ . "/../actions/ActionInsertProduct.php";
require_once __DIR__ . "/../actions/ActionGetProduct.php";
require_once __DIR__ . "/../actions/ActionDeleteProduct.php";
require_once __DIR__ . "/../actions/ActionUpdateProfile.php";
require_once __DIR__ . "/../actions/ActionUpdateProduct.php";



$action = null;
if (!isset($_POST["action"]))
    echo "no se ha indicado el action..";
else
    switch ($_POST["action"]) {
        case 'register':
            $action = new ActionRegister();
            header('Location: ../../index.php');
            break;
        case 'login':
            $action = new ActionLogin();
            header('Location: ../../index.php');
            break;
        case 'logout':
            $_SESSION["logged_user"] = null;
            header('Location: ../../index.php');
            exit();
            break;
        case 'insert_product':
            $action = new ActionInsertProduct();
            break;
        case 'getProduct':
            $action = new ActionGetProduct();
            break;
        case 'deleteProduct':
            if (isset($_POST['id'])){
                $action = new ActionDeleteProduct();
                $result = $action->DeletProduct($_POST['id']);
                echo $result ? "Producto Eliminado con exito." : "Error al eliminar el producto.";
                header("Location: ../../admintPanel.php");
            }else{
                echo "ID del producto no especificado";
            }
           break;
           
        case 'updateProduct':
            $action = new ActionUpdateProduct();
            break;

        case 'updateProfile':
            $action = new ActionUpdateProfile;
            break;

        default:
            echo "NO existe este usuario";
            break;
    }

if ($action != null && $action instanceof IAction)
    $action->execute($_POST, $_SESSION, $_FILES);
?>