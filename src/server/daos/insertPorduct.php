<?php
require_once __DIR__ . "/DatabaseController.php";

session_start();

class ActionInsertProduct {

    function execute($file) {
        $db = new DatabaseController();

        // Verificar que el archivo esté presente y no tenga errores
        if (isset($file['product_avatar']) && $file['product_avatar']['error'] === UPLOAD_ERR_OK) {
            $name = pathinfo($file['product_avatar']['nameProduct'], PATHINFO_FILENAME);
            $extension = pathinfo($file['product_avatar']['nameProduct'], PATHINFO_EXTENSION);
            $path = "/Tienda/src/public/img/" . $file['product_avatar']['nameProduct'];
            
            // Mover el archivo a la carpeta de imágenes
            if (move_uploaded_file($file['product_avatar']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path)) {
                // Guardar la ruta en la base de datos
                if ($db->insert($extension, $path)) {
                    echo "Imagen subida y guardada en la base de datos correctamente.";
                } else {
                    echo "Error al guardar la información de la imagen en la base de datos.";
                }
            } else {
                echo "Error al mover la imagen al directorio de destino.";
            }
        } else {
            echo "Error en la subida del archivo.";

        }
    }
}
?>  