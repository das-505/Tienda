<?php

require_once __DIR__ . "/../popos/Users.php";
require_once __DIR__ . "/../popos/Admin.php";
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../tools/cookie.php";
require_once __DIR__ . "/../daos/DatabaseController.php";


class ActionLogin implements IAction
{
    const ATTR_ACTION = "ActionLogin";

    function execute($post){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $db = new DatabaseController();
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        
        if (!$email || !$password) {
            echo "Email o contraseña no proporcionados.";
            return;
        }

        // Recuperar datos del usuario de la base de datos
        $data = array("email" => $email);
        $user = $db->getByData("users", $data);

        if (count($user) > 0) {

            if (password_verify($password, $user[0]['password'])) {
                $loggedUser = null;

                //verificamos si es admin.
                if ($user[0]['is_admin'] == 1) {
                    $loggedUser = new Admin(
                        $user[0]["username"],
                        $user[0]["email"],
                        true,
                        $user["name"] ?? "",
                        $user["surname"] ?? "",
                        $user["mobilenumber"] ?? "",
                        $user["postcode"] ?? "",
                        $user["password"] ?? ""
                    );
                } else {
                    $loggedUser = new User(
                        $user[0]["username"],
                        $user[0]["email"],
                        $user[0]["name"],
                        $user[0]["surname"],
                        $user[0]["mobilenumber"],
                        $user[0]["postcode"],
                        $user[0]["password"]
                    );
                }
                 
                $_SESSION["logged_user"] = serialize($loggedUser);

                $token = bin2hex(random_bytes(32)); 

                $updateData = [
                    'token' => $token
                ];
                $condition = "id = " . $user[0]["id"];
                $db->update("users", $updateData, $condition);

                // Crear o actualizar la cookie
                Cookie::setCookie("login_token", $token, 7600 * 1);
                
                header('Location: ../../index.php');
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    }
}
