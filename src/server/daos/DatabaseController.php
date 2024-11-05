<?php

class DatabaseController {
    private $host = 'localhost'; // Cambia si es necesario
    private $db_name = 'sistemacatalogo'; // Nombre de tu base de datos
    private $username = 'root'; // Tu usuario de base de datos
    private $password = ''; // Tu contraseña de base de datos
    private $connection;

    public function __construct() {
        $this->connect();
    }

    // Método para conectar a la base de datos
    private function connect() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Método para ejecutar una consulta
    public function executeQuery($query, $params = []) {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    // Método para obtener todos los registros de una tabla
    public function getAll($table) {
        $query = "SELECT * FROM " . $table;
        $stmt = $this->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByData($table, $data = []) {
        $query = "SELECT * FROM " . $table;

        if(count($data) > 0){
            $query .= " WHERE ";
            $flag = true;
            foreach($data as $key => $value){
                if($flag)
                    $flag = false;
                else 
                    $query .= " AND ";
            
                $query .= " $key = '$value' ";
            }
        }
        echo"$query";
        $stmt = $this->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un registro por ID
    public function getById($table, $id) {
        $query = "SELECT * FROM " . $table . " WHERE id = '$id'";
        $stmt = $this->connection->prepare($query);
        $stmt = $this->executeQuery($query);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para insertar un registro
    public function insert($table, $data) {
        
        // $query_sample = "INSERT INTO users (username, email, password) VALUES ('saurasmaker', 'saurasmaker@gmail.com', '1234a')"
        
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO " . $table . " ($columns) VALUES ($placeholders)";
        $this->executeQuery($query, $data);
        return $this->connection->lastInsertId();
    }

    // Método para cerrar la conexión
    public function close() {
        $this->connection = null;
    }
}

?>
