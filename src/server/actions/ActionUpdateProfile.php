<?php

require_once __DIR__ . "/../daos/DatabaseController.php";

class ActionUpdateProfile
{
    public function execute($post, $session)
    {
        $db = new DatabaseController();

        // Validación de datos
        if (empty($post['name']) || empty($post['email']) || empty($post['username'])) {
            echo "Por favor, complete todos los campos obligatorios.";
            return false;
        }

        // Preparar datos para la actualización
        $id = $post['id'];
        $updateData = [
            'name' => $post['name'],
            'surname' => $post['surname'],
            'mobilenumber' => $post['mobilenumber'],
            'postcode' => $post['postcode'],
            'username' => $post['username'],
            'email' => $post['email'],
        ];

        $condition = "id = :id";
        $updateData['id'] = $id;

        // Actualizamos la base de datos
        $db->update('users', $updateData, $condition);

        // Actualizar los datos en la sesión
        $updatedUser = $db->getById('users', $id);
        if ($updatedUser) {
            $session['logget_user'] = serialize(new User($updatedUser));
            echo "Perfil actualizado con éxito.";
            return true;
        } else {
            echo "Error al obtener los datos actualizados del usuario";
        }
        
    }

    
}
