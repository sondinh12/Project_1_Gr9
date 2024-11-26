<?php
class DonHang
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách tất cả các đơn hàng
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM orders';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật dữ liệu đơn hàng
    public function updateData($id_orders, $trang_thai, $phuong_thuc_thanh_toan, $update_at)
    {
        try {
            $sql = "UPDATE orders 
                    SET status = :status, 
                        payment = :payment, 
                        update_at = :update_at 
                    WHERE id_orders = :id_orders";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':status', $trang_thai);
            $stmt->bindParam(':payment', $phuong_thuc_thanh_toan);
            $stmt->bindParam(':update_at', $update_at);
            $stmt->bindParam(':id_orders', $id_orders);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Lấy thông tin chi tiết của đơn hàng
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM orders_detail WHERE id_ordt = :id_ordt';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_ordt', $id);
            $stmt->bindParam(':id_orders',$id_orders);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Hủy kết nối đến cơ sở dữ liệu
    public function __destruct()
    {
        $this->conn = null;
    }
}
