<?php
require_once __DIR__ . "/../daos/DatabaseController.php";
require_once __DIR__ . "/../interfaces/IAction.php";
require_once __DIR__ . "/../controllers/controller.php";


class ActionInsertProduct implements IAction
{

    public function execute($post)
    {
        $db = new DatabaseController();

        // Obtener datos del producto desde $post y archivo desde $files
        $name = $post['nameProduct'] ?? null;
        $price = $post['price'] ?? null;
        $category = $post['category'] ?? null;
        $description = $post['description'] ?? null;
        $file = $_FILES['product_avatar'] ?? null;

        if (!$name || !$price || !$description) {
            echo "Falta datos obligatorios del producto.";
            return;
        }
        if(!$file || $file['error'] !== UPLOAD_ERR_OK){
            echo "Error en la subida del archivo.";
            return;
        }

        $imageName = pathinfo($file['name'], PATHINFO_FILENAME);
        $imageExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $imagePath = "/Tienda/src/public/img/" . $file['name'];

        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
           //insertar los datos de la imagen en file.
            $imageData = [
            'name' => $imageName,
            'extension' => $imageExtension,
            'path' => $imagePath
           ];

           $fileId = $db->insert('file', $imageData);
           if(!$fileId){
            echo "Error al guardar los datos del archivo.";
            return;
           }
           
           //Inserta los datos del producto en la tabla 'product'
            $data = [
                'name' => $name,
                'price' => $price,
                'category' => $category,
                'file_id' => $fileId,
                'description' => $description,
            ];

            if ($db->insert('products', $data)) {
                header("Location: ../../adminPanel.php");
            } else {
                echo "Error al guardar el producto en la base de datos.";
            }
        } else {
            echo "Error al mover la imagen al directorio de destino.";
        }
    }
}
?>
