<?php
class Database {
    private $host = "127.0.0.1";
    private $user = "root";
    private $pass = "";
    private $dbname = "wad_handson";
    private $port = 3308;
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname, $this->port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products"; 
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function addProduct($name, $category, $brand, $price, $stock) {
        $sql = "INSERT INTO products (name, category, brand, price, stock) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssdi", $name, $category, $brand, $price, $stock); 
        return $stmt->execute();
    }
    public function updateProduct($id, $name, $category, $brand, $price, $stock) {
        $sql = "UPDATE products SET name=?, category=?, brand=?, price=?, stock=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssdis", $name, $category, $brand, $price, $stock, $id);
        return $stmt->execute();
    }
    
    
    

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
