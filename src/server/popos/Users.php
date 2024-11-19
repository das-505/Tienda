<?php
class User{
    
    private const HOLA_CONST = "USER_CONST";
    public static $HOLA_STAT = "USER_STAT";

    // ATTRIBUTES
    protected string $name, $username, $email, $password, $surname, $mobilenumber, $postcode;
    private DateTime $birthdate;


    // Getters
    function getSurname(){
        return $this->surname;
    }

    function getMobilenumber(){
        return $this->mobilenumber;
    }

    function getPostcode(){
        return $this->postcode;
    }

    function getUsername(){
        return $this->username;
    }
    
    function getEmail(){
        return $this->email;
    }

    function getName(){
        return $this->name;
    }

    function getPassword(){
        return $this->password;
    }

    function getBirthdate() : DateTime{
        return $this->birthdate;
    }

    //Setters

    function setSurname($surname){
        $this->surname = $surname;
    }

    function setMobilenumber($mobilenumber){
        $this->mobilenumber = $mobilenumber;
    }

    function setPostcode($postcode){
        $this->postcode = $postcode;
    }

    function setUsername($username){
        $this->username = $username;
    }


    function setEmail($email){
        $this->email = $email;
    }


    function setName($name){
        $this->name = $name;
    }


    
    function setPassword($password){
        $this->password = $password;
    }


    function setBirthdate(DateTime $birthdate){
        $this->birthdate = $birthdate;
    }


    public function jsonSerialize() {
        return array(
            'name' => $this->name
        );
    }
}
?>