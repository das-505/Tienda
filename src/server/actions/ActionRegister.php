<?php

require_once __DIR__ . "/../popos/Users.php";
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../daos/DatabaseController.php";

session_start();

class ActionRegister implements IAction
{

    function execute($post)
    {
        $db = new DatabaseController();

        $data = array(
            "name" => $_POST["name"],
            "surname" => $_POST["surname"],
            "username" => $_POST["username"],
            "mobilenumber" => $_POST["mobilenumber"],
            "postcode" => $_POST["postcode"],
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
        );


        if ($db->insert("users", $data))
        
        echo "Registro correcto! <br/> " . $_POST["username"];
        
        else
            echo "Error al registrar...";
    }
}
?>