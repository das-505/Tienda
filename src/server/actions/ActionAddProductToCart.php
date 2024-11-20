<?php

session_start();

class ActionAddToCart{

    public function addToCart(){

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Aquí podrías usar datos reales desde tu base de datos.
        // Por simplicidad, este ejemplo usa datos simulados.
        $response = [
            "products" => $_SESSION['cart'],
            "subtotal" => array_reduce($_SESSION['cart'], fn($total, $item) => $total + $item['price'] * $item['quantity'], 0)
        ];

        header('Content-Type: application/json');
        echo json_encode($response);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'remove') {
            $productId = $_POST['product_id'];
        
            // Buscar y eliminar producto del carrito
            $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($item) => $item['id'] !== $productId);
        
            echo json_encode(["success" => true]);
            exit;
        }
        

    }
}
