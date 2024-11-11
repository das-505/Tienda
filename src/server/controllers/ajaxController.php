<? 
header('Content-Type: application/json');

class Producto{
    
    public $nombre = "producto_nombre";

}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $busquedaProducto = isset($_POST['busqueda-producto']) ? $_POST['busqueda-producto'] : 'Invitado';

    $auxProduct = new Product();

}




?>