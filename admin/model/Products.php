<?php
class Product {
    public $conn = null;
    public function __construct() {
        $this->conn = connectDB();
    }
    public function all() {
        $sql = "SELECT * FROM  products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>