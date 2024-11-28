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
require_once __DIR__ . "/../actions/ActionAddToCart.php";



$action = null;
if (!isset($_POST["action"]))
    echo "no se ha indicado el action..";
else
    switch ($_POST["action"]) {
        case 'register':
            $action = new ActionRegister();
            echo (['success' => 'Usuario Registrado']);
            break;
        case 'login':
            $action = new ActionLogin();
            break;
        case 'logout':
            //para eliminar el token de la base de datos.
            $token = Cookie::getCookie('login_token');
            if ($token) {
                $db = new DatabaseController();
                $updateData = ['token' => null];
                $condition = "token = '$token'";
                $db->update("users", $updateData, $condition);
            }

            //para eliminar la cookie
            Cookie::deleteCookie("login_token");

            $session["logged_user"] = null;
            session_destroy();

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
            if (isset($_POST['id'])) {
                $action = new ActionDeleteProduct();
                $result = $action->DeletProduct($_POST['id']);
                echo $result ? "Producto Eliminado con exito." : "Error al eliminar el producto.";
                header("Location: ../../adminPanel.php");
            } else {
                echo "ID del producto no especificado";
            }
            break;
        case 'deleteUser':
            if (isset($_POST['id'])) {
                $action = new ActionDeleteProduct();
                $result = $action->DeletUser($_POST['id']);
                echo $result ? "Usuario Eliminado con exito." : "Error al eliminar el user.";
                header("Location: ../../adminUser.php");
            } else {
                echo "ID del user no especificado";
            }
            break;
        case 'updateProduct':
            $action = new ActionUpdateProduct();
            break;

        case 'updateProfile':
            $action = new ActionUpdateProfile;
            $result = $action->execute($_POST, $_SESSION);
            if ($result) {
                echo "Perfil actualizado";
            } else {
                echo "Error al actualizar el perfil";
            }
            break;

        case 'addToCart':
            //      $action = new ActionAddToCart();
            break;

        default:
            echo "NO existe este usuario";
            break;
    }

if ($action != null && $action instanceof IAction)
    $action->execute($_POST, $_SESSION, $_FILES);
