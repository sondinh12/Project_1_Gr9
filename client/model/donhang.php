<?php
class DonHang{
    public $db = null;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function getOdersByUserId(){
        $sql = "SELECT * FROM orders WHERE orders.id_us = :userId ORDER BY create_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $_SESSION['user']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderDetail($orderId){
        $sql ="SELECT products.name, orders_details.quantity, orders_details.price FROM orders_details INNER JOIN products ON orders_details.id_pro = products.id_pro WHERE orders_details.id_orders = :orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
