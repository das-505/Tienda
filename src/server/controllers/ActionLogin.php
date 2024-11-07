<?php

require_once __DIR__ . "/../popos/Users.php";
require_once __DIR__ . "/../interfaces/IAction.php";

class ActionLogin implements IAction{
    
    function execute($post){

        $db = new DatabaseController();
        $pass = $_POST['password'];
        $data = array(
            "email" => $_POST["email"]
        );
        $user = $db->getByData("users", $data);
              
        if(count($user) > 0){
            if(password_verify($pass, $user[0]["password"])){
                echo "Autenticación correcta! " . $user[0]["email"] . " " . $user[0]["password"]; 
            }
            else{
                echo "Error en la contraseña";
            }
        }
                      
        else
            echo "Este usuario no existe";  

 }
    

}
?>