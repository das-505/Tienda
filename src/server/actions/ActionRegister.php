<?php

require_once __DIR__ . "/../popos/Users.php";
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../daos/DatabaseController.php";

session_start();

class ActionRegister implements IAction
{
    public function execute($post)
    {
        $db = new DatabaseController();

        // Validación básica de datos
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            echo "Por favor, complete todos los campos obligatorios.";
            return;
        }

        // Verificar si ya existe un usuario con el mismo email
        $existingUser = $db->getByData("users", ["email" => $_POST["email"]]);
        if (count($existingUser) > 0) {
            echo "El correo electrónico ya está registrado.";
            return;
        }

        // Preparar datos para inserción
        $data = array(
            "name" => $_POST["name"],
            "surname" => $_POST["surname"] ?? "",
            "username" => $_POST["username"] ?? $_POST["name"], // Predeterminado al nombre si no se proporciona
            "mobilenumber" => $_POST["mobilenumber"] ?? "",
            "postcode" => $_POST["postcode"] ?? "",
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
            "is_admin" => 0 // Todos los usuarios registrados inicialmente serán normales
        );

        // Insertar en la base de datos
        if ($db->insert("users", $data)) {
            echo "Registro correcto! Bienvenido, " . htmlspecialchars($_POST["username"]) . ".";

            // Crear instancia de usuario registrado
            $loggedUser = new User(
                $data["username"],
                $data["email"],
                $data["name"],
                $data["surname"],
                $data["mobilenumber"],
                $data["postcode"]
            );

            // Guardar usuario en sesión
            $_SESSION["logged_user"] = serialize($loggedUser);

            // Redirigir al inicio
            header('Location: ../../index.php');
            exit();
        } else {
            echo "Error al registrar. Inténtelo de nuevo.";
        }
    }
}
?>
