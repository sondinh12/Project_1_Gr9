<?php
class Product
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function all()
    {
        $sql = "SELECT * FROM  products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function productsInCategory($madm)
    {
        $sql = "SELECT * FROM products WHERE id_cate=$madm ORDER BY id_pro DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find_one($id)
    {
        $sql = "SELECT * FROM products WHERE id_pro = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function productInCategory($madm)
{
        $sql = "SELECT * FROM products WHERE id_cate = :madm ORDER BY id_pro DESC LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':madm', $madm, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
}

}