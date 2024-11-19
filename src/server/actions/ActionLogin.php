<?php

require_once __DIR__ . "/../popos/Users.php";
require_once __DIR__ . "/../interfaces/IAction.php";

class ActionLogin implements IAction
{

    const ATTR_ACTION = "ActionLogin";

    function execute($post){

        session_start();

        $db = new DatabaseController();
        $pass = $_POST['password'];
        $data = array(
            "email" => $_POST["email"]
        );
        $user = $db->getByData("users", $data);


        if (count($user) > 0) {

            $loggedUser = new User();

            $loggedUser->setEmail($user[0]["email"]);
            $loggedUser->setUsername($user[0]["username"]);
            $loggedUser->setName($user[0]["name"]);
            $loggedUser->setSurname($user[0]["surname"]);
            $loggedUser->setMobilenumber($user[0]["mobilenumber"]);
            $loggedUser->setPostcode($user[0]["postcode"]);

            $_SESSION["logged_user"] = serialize($loggedUser);

            header('Location: ../../index.php');
            exit();
        } else
            echo "Este usuario no existe";


    }
}
?>