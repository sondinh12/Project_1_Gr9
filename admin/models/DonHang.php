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
    public function updateData($id_orders, $trang_thai, $update_at)
    {
        try {
            $sql = "UPDATE orders 
                    SET status = :status, 
                        update_at = :update_at 
                    WHERE id_orders = :id_orders";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':status', $trang_thai);
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
    public function DetailData($id)
    {
        try {
            $sql = 'SELECT * FROM orders WHERE id_orders = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            
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


    public function DetailDon($id)
{
    try {
        // Lấy thông tin chi tiết đơn hàng từ bảng 'orders'
        $sql = 'SELECT * FROM orders WHERE id_orders = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $order = $stmt->fetch();

        // Lấy các sản phẩm trong đơn hàng từ bảng 'orders_detail'
        $sql_detail = 'SELECT * FROM orders_detail WHERE id_orders = :id';
        $stmt_detail = $this->conn->prepare($sql_detail);
        $stmt_detail->bindParam(':id', $id);
        $stmt_detail->execute();
        $order_details = $stmt_detail->fetchAll();

        return ['order' => $order, 'details' => $order_details];
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}

}
