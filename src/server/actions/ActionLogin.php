<?php

require_once __DIR__ . "/../popos/Users.php";
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../tools/cookie.php";


class ActionLogin implements IAction
{
    const ATTR_ACTION = "ActionLogin";

    function execute($post)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $db = new DatabaseController();
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Recuperar datos del usuario de la base de datos
        $data = array("email" => $email);
        $user = $db->getByData("users", $data);

        if (count($user) > 0) {
            if (password_verify($password, $user[0]['password'])) {
                $loggedUser = new User();
                $loggedUser->setEmail($user[0]["email"]);
                $loggedUser->setUsername($user[0]["username"]);
                $loggedUser->setName($user[0]["name"]);
                $loggedUser->setSurname($user[0]["surname"]);
                $loggedUser->setMobilenumber($user[0]["mobilenumber"]);
                $loggedUser->setPostcode($user[0]["postcode"]);

                $_SESSION["logged_user"] = serialize($loggedUser);

                // Crear o actualizar la cookie
                Cookie::setCookie("logged_user", [
                    "id" => $user[0]["id"],
                    "username" => $user[0]["email"]
                ]);

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
