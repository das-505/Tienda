<?php
class User{
    
    private const HOLA_CONST = "USER_CONST";
    public static $HOLA_STAT = "USER_STAT";

    // ATTRIBUTES
    protected string $name, $username, $email, $password, $surname, $mobilenumber, $postcode;
    
    public function __construct(
        string $username = "",
        string $email = "",
        string $name = "",
        string $surname = "",
        string $mobilenumber = "",
        string $postcode = "",
        string $password = ""
    ){
     $this->username = $username;
     $this->email = $email;
     $this->name = $name;
     $this->surname = $surname;
     $this->mobilenumber = $mobilenumber;
     $this->postcode = $postcode;
     $this->password = $password;     
    }

    // Getters
    function getSurname(): string{
        return $this->surname;
    }

    function getMobilenumber(): string{
        return $this->mobilenumber;
    }

    function getPostcode(): string{
        return $this->postcode;
    }

    function getUsername(): string{
        return $this->username;
    }
    
    function getEmail(): string{
        return $this->email;
    }

    function getName(): string{
        return $this->name;
    }

    function getPassword(): string{
        return $this->password;
    }

    //Setters

    function setSurname($surname): void{
        $this->surname = $surname;
    }

    function setMobilenumber($mobilenumber): void{
        $this->mobilenumber = $mobilenumber;
    }

    function setPostcode($postcode): void{
        $this->postcode = $postcode;
    }

    function setUsername($username): void{
        $this->username = $username;
    }


    function setEmail($email): void{
        $this->email = $email;
    }


    function setName($name): void{
        $this->name = $name;
    }


    
    function setPassword($password): void{
        $this->password = $password;
    }




    public function jsonSerialize() {
        return array(
            'name' => $this->name
        );
    }
}
?>