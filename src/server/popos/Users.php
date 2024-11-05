<?php
class User{
    
    private const HOLA_CONST = "USER_CONST";
    public static $HOLA_STAT = "USER_STAT";

    // ATTRIBUTES
    protected string $name, $username, $email, $password;
    private DateTime $birthdate;

    /*
    function __construct($name, $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
    }
    */

    // Métodos
    function comprar($productos, $valores = null){
        
        if($valores == null)
        
        return json_encode($productos);
    }


    // Getters y Setters
    function getUsername(){
        return $this->username;
    }
    function setUsername($username){
        $this->username = $username;
    }


    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email = $email;
    }


    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name = $name;
    }


    function getPassword(){
        return $this->password;
    }
    function setPassword($password){
        $this->password = $password;
    }


    function getBirthdate() : DateTime{
        return $this->birthdate;
    }

    function setBirthdate(DateTime $birthdate){
        $this->birthdate = $birthdate;
    }


    static function generateRandomUser() : User{
        $auxUser = new User("Iván", new DateTime("now"));

        return $auxUser;
    }

    public function jsonSerialize() {
        return array(
            'name' => $this->name
        );
    }
}
?>