<? 
header('Content-Type: application/json');

class Producto{
    
    public $nombre = "producto_nombre";
    public $precio = 21.95;

}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $busquedaProducto = isset($_POST['busqueda-producto']) ? $_POST['busqueda-producto'] : 'Invitado';

    $auxProduct = new Producto();
    $auxProduct->nombre = "producto-1";
    $auxProduct->precio = 222;

    $productos = [];
    for($i = 0; $i <10; ++$i){
        $auxProduct = new Producto();
        $auxProduct->nombre = "producto_$i";
        $auxProduct->precio *= ($i + 1); 

        array_push($productos, 
        [
            "id" => $i,
            'nombre' => $auxProduct->nombre,
            'precio' => $auxProduct->precio
        ]);

    }

    echo json_encode($productos);

}else {
    echo json_encode(['error' => 'Método no permitido']);
}





?>