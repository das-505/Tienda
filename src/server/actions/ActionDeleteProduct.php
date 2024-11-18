<?php

require_once __DIR__ . "/../daos/DatabaseController.php";

class ActionDeleteProduct{

    public function DeletProduct($id){

        $db = new DatabaseController();
        return $db->deleteProduct('products', $id);
    }
}

?>