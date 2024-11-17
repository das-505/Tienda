<?php

require_once __DIR__ . "/../daos/DatabaseController.php";
require_once __DIR__ . "/../controllers/controller.php";

class ActionDeleteProduct{

    public function DeletProduct()
    {
        $db = new DatabaseController();

        $deleted = $db->deleteProduct('products', 8);

        if ($deleted) {
            echo "Producto eliminado con éxito.";
        } else {
            echo "No se encontró el producto o no se pudo eliminar.";
        }
    }
}

?>