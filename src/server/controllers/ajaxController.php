<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../actions/ActionGetProduct.php'; // Asegúrate de que la ruta sea correcta

try {
    $action = new ActionGetProduct();
    $productos = $action->getProduct();

    $response = [];
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
    http_response_code(500); // Envía un código de error 500 en caso de fallo
    echo json_encode(['error' => $e->getMessage()]);
}
