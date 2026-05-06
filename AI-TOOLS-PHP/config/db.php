<?php
// Session 2 - OOP Example: Database Connection Class
// This demonstrates how to convert procedural connection to OOP.

class Database {
    // Database credentials
    private $host = "localhost";
    private $db_name = "ai_tools_db"; // Make sure to create this DB in phpMyAdmin
    private $username = "root";       // Default XAMPP username
    private $password = "";           // Default XAMPP password is empty
    public $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;

        try {
            // Using PDO for secure database interactions
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Set error mode to exception to catch errors easily
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Uncomment the line below to test connection
            // echo "Connected successfully"; 
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            // Note for beginners: If you see an error, check if MySQL is running in XAMPP!
        }

        return $this->conn;
    }
}

// How to use this class in other files:
// require_once 'config/db.php';
// $database = new Database();
// $db = $database->getConnection();
?>