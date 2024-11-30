<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../actions/ActionGetProduct.php';

try {
    $action = new ActionGetProduct();
    
    // Obtener los parámetros de la solicitud
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
    $minPrice = isset($_GET['min-price']) ? $_GET['min-price'] : null;
    $maxPrice = isset($_GET['max-price']) ? $_GET['max-price'] : null;

    // Filtrar productos según los parámetros
    if ($categoria) {
        $productos = $action->getProductByCategory($categoria);
    } elseif ($minPrice !== null || $maxPrice !== null) {
        $productos = $action->getProductByPriceRange($minPrice, $maxPrice);
    } else {
        $productos = $action->getProduct();
    }

    $response = [];
    
    foreach ($productos as $producto) {
        $response[] = [
            'id' => $producto['id'],
            'name' => $producto['name'],
            'category' => $producto['category'],
            'price' => $producto['price'],
            'image_path' => !empty($producto['image_path']) ? $producto['image_path'] : '/Tienda/src/public/img/cuchillo-de-monte-hoja-curva-madera.jpg',
        ];
    }

    echo json_encode($response);

} catch (Exception $e) {
    http_response_code(500); // Responder con error 500 en caso de fallo
    echo json_encode(['error' => $e->getMessage()]);
}
