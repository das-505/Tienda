<?php
class ActionUpdateProfile
{

    public function updateProfile($data)
    {
        $db = new DatabaseController();

        $id = $data['id'];
        $updateData = [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'mobilenumber' => $data['mobilenumber'],
            'postcode' => $data['postcode'],
            'username' => $data['username'],
            'email' => $data['email']
        ];

        $condition = "id = :id";
        $updateData['id'] = $id;

        $db->update('users', $updateData, $condition);
        $updatedUser = $db->getById('users', $id);

        // Actualizar los datos en la sesión
        session_start(); // Asegúrate de que la sesión esté inicializada
        $_SESSION['logged_user'] = serialize(new User($updatedUser));
        return true;
    }
}
