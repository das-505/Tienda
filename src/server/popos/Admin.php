<?php

require_once __DIR__ . "/Users.php";

class Admin extends user
{

    public bool $isAdmin;

    public function __construct(
        string $username,
        string $email,
        bool $isAdmin,
        string $name = "", 
        string $surname = "",
        string $mobilenumber = "",
        string $postcode = "",
        string $password = ""        
    ){
        parent::__construct($username, $email, $name, $surname, $mobilenumber, $postcode, $password);
        $this->isAdmin = $isAdmin;
    }
}

?>