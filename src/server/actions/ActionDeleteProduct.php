<?php

require_once __DIR__ . "/../daos/DatabaseController.php";

class ActionDeleteProduct{

    public function DeletProduct($id){

        $db = new DatabaseController();

        $product = $db->getById('products', $id);
        $fileId = $product['file_id'] ?? null;

        $deleted = $db->deleteProduct('products', $id);

        if($deleted && $fileId){
            $db->deleteProduct('file', $fileId);
        }

        return $deleted;
    }

    public function DeletUser($id){

        $db = new DatabaseController();

        $user = $db->getById('users', $id);
        $fileId = $user['file_id'] ?? null;

        $deleted = $db->deleteProduct('users', $id);

        if($deleted && $fileId){
            $db->deleteProduct('file', $fileId);
        }

        return $deleted;
    }

    
}

?>