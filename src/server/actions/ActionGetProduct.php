<?php

require_once __DIR__ . "/../daos/DatabaseController.php";

class ActionGetProduct {

    private $db;

    public function __construct() {
        $this->db = new DatabaseController(); 
    }

    // Obtener todos los productos
    public function getProduct() {
        return $this->db->getAll('products'); 
    }

    // Obtener productos filtrados por categoría
    public function getProductByCategory($category) {
        // Filtrar por la categoría usando `getByData`
        $filters = ['category' => $category];
        return $this->db->getByData('products', $filters);
    }
}

?>