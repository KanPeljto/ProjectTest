<?php

require_once __DIR__ . "/../../config.php";

class BaseDao {
    protected $connection;
    private $table;

    public function __construct($table){
        $this->table = $table;
        try {
            $this->connection = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
                DB_USER,
                DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch(PDOException $e) {
            
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get_result($sql) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    
}






