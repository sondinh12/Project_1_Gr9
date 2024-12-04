<?php
class DonHang{
    public $db = null;
    public function __construct()
    {
        $this->db = connectDB();
    }
    public function getOdersByUserId(){
        $sql = "SELECT * FROM orders WHERE orders.id_us = :userId  AND orders.status = 1 ORDER BY create_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $_SESSION['id']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderDetail($orderId){
        $sql ="SELECT products.name,products.image, orders_detail.quantity, orders_detail.price, orders_detail.phone, orders_detail.address FROM orders_detail INNER JOIN products ON orders_detail.id_pro = products.id_pro WHERE orders_detail.id_orders = :orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOddtCancel($orderId){
        $sql="select id_pro, quantity from orders_detail where id_orders = :orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function updateProStockCancel($id_pro,$quantity){
        $sql="update products set quantity = quantity + :quantity where id_pro = :id_pro";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':id_pro', $id_pro);
        return $stmt->execute();
    }

    public function updateOrderStatus($orderId){
        $sql="update orders set status = 5 where id_orders = :orderId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function cancelOrder($orderId){
        $orderProducts = $this->getOddtCancel($orderId);
        foreach ($orderProducts as $product) {
           $result =  $this->updateProStockCancel($product['id_pro'], $product['quantity']);
        }
        $updateResult = $this->updateOrderStatus($orderId);
        // var_dump($updateResult);
        return $updateResult;
    }
}
