<?php

class DataBase {
    private $host = "localhost";
    private $db_name = "sistemacatalogo";
    private $usename = "root";
    private $password = "";
    private $connection;


    public function __construct()
    {
        $this->connect();
    }


    //for connecting to data base.
    private function connect()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->usename, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    //Method of execute a query
    public function executeQuery($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    //Method of get all the records from table.
    public function getAll($table)
    {
        $query = "SELECT * FROM " . $table;
        $stmt = $this->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByData($table, $data = [])
    {
        $query = "SELECT * FROM " . $table;

        if (count($data) > 0) {
            $query .= "WHERE ";
            $flag = true;
            foreach ($data as $key => $value) {
                if ($flag)
                    $flag = false;
                else
                    $query .= " AND ";

                $query .= " $key = '$value' ";
            }
        }

        $stmt = $this->executeQuery($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Method to get a record by ID.
    public function getById($table, $id)
    {
        $query = "SELECT * FROM " . $table . " WHERE id = '$id'";
        $stmt = $this->connection->prepare($query);
        $stmt = $this->executeQuery($query);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //For insert a record.
    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO " . $table . " ($columns) VALUES ($placeholders)";
        $this->executeQuery($query, $data);
        return $this->connection->lastInsertId();
    }


    // Method for close the connection
    public function close()
    {
        $this->connection = null;
    }
}

header("Location: login.php");
?>