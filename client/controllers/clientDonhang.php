<?php
// require_once "../model/donhang.php";
class ClientDonHang {
    protected $donhang;

    public function __construct() {
        $this->donhang = new DonHang();
    }

    public function lichSuDonHang() {
       
        if (!isset($_SESSION['id'])) {
            echo "Vui lòng đăng nhập để xem lịch sử đơn hàng.";
            return;
        }
        $id = $_SESSION['id'];
        $orders = $this->donhang->getOdersByUserId(); 
        require_once "views/lichSuDonHang.php";
    }


    public function chiTietDonHang() {
        $orderId = $_GET['id'];
        $orderDetails = $this->donhang->getOrderDetail($orderId);
        require_once "views/chiTietDonHang.php";
    }

    public function huyDonHang() {
        if (!isset($_POST['id'])) {
            echo "Cần có ID đơn hàng để hủy.";
            return;
        } 
        $orderId = (int)$_POST['id'];
        var_dump($orderId);
        if(isset($_POST['btn_cancel_orders'])){
            $orders = $this->donhang->getOdersByUserId(); 
            // var_dump($orders);
            $result = $this->donhang->cancelOrder($orderId);
            // var_dump($result);
            if ($result) {
                // echo "<script>alert('Đơn hàng đã được hủy thành công.');</script>";
                header("location: ?act=lich-su-don-hang");
            } else {
                echo "Lỗi";
            }
        }
    }
}
?>
