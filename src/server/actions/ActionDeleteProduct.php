<?php

require_once __DIR__ . "/../daos/DatabaseController.php";
require_once __DIR__ . "/../controllers/controller.php";

class ActionDeleteProduct{

    function DeletProduct(){

        $db = new DatabaseController();
        return $db->executeQuery('DELETE FROM products WHERE `products`.`id` = **');
    }
}
