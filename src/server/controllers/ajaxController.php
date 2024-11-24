<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../actions/ActionGetProduct.php';

try {
    $action = new ActionGetProduct();
    
    // Obtener la categoría de los parámetros de la solicitud (si existe)
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;

    // Si se pasa una categoría, filtrar, de lo contrario, obtener todos los productos
    if ($categoria) {
        $productos = $action->getProductByCategory($categoria);
    } else {
        $productos = $action->getProduct();
    }

    
    foreach ($productos as $producto) {
        $response[] = [
            'id' => $producto['id'],
            'name' => $producto['name'],
            'category' => $producto['category'],
            'price' => $producto['price'],
            'image_path' => !empty($producto['image_path']) ? $producto['image_path'] : 'sin_image.jpg',
        ];
    }

    echo json_encode($response);

} catch (Exception $e) {
    http_response_code(500); // Responder con error 500 en caso de fallo
    echo json_encode(['error' => $e->getMessage()]);
}
