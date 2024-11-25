<?php 

require_once __DIR__ . "/Users.php";

class admin extends user{

public bool $isAdmin;

function __construct(bool $isAdmin){
    
    $this->isAdmin = $isAdmin;

}

}

?>