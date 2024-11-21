<?php

require_once __DIR__ . "/../daos/DatabaseController.php";

class ActionGetProduct{

    function getProduct(){

        $db = new DatabaseController();
        return $db->getAll('products');
    }
}
