<?php
require_once __DIR__ . '/../popos/Product.php';

class ActionAddToCart {
    public function execute($post, $session, $files) {
        $this->addToCart();
    }

    public function addToCart() {
        // Asegurarse de que la sesión está inicializada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        error_log("Ejecutando addToCart");

        // Validar el método de solicitud
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos
            if (!isset($_POST["product_id"])) {
                echo json_encode(['error' => 'Id del producto no especificado']);
                exit;
            }

            if (!isset($_POST["product_price"])) {
                echo json_encode(['error' => 'Precio del producto no especificado']);
                exit;
            }

            // Inicializar el carrito si no existe
            if (!isset($_SESSION["cart"])) {
                $_SESSION["cart"] = [];
            }

            // Crear el producto a añadir
            $productToAdd = new Product();
            $productToAdd->setId(intval($_POST["product_id"]));
            $productToAdd->setName("Producto " . $productToAdd->getId());
            $productToAdd->setPrice(floatval($_POST["product_price"]));

            // Verificar si el producto ya está en el carrito
            foreach ($_SESSION["cart"] as $product) {
                if (unserialize($product)->getId() === $productToAdd->getId()) {
                    echo json_encode(['error' => 'Producto ya en el carrito']);
                    exit;
                }
            }

            // Añadir el producto al carrito
            $_SESSION["cart"][] = serialize($productToAdd);
            echo json_encode(['success' => 'Producto añadido al carrito']);
            exit;
        }

        // Si el método no es POST
        echo json_encode(['error' => 'Método no permitido']);
        exit;
    }
}
?>
