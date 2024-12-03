<?php
// require_once "../model/donhang.php";
class ClientDonHang {
    protected $donhang;

    public function __construct() {
        $this->donhang = new DonHang();
    }

    public function lichSuDonHang() {
       
        if (!isset($_SESSION['user'])) {
            echo "Vui lòng đăng nhập để xem lịch sử đơn hàng.";
            return;
        }
        $orders = $this->donhang->getOdersByUserId(); 
        require_once "views/lichSuDonHang.php";
    }


    public function chiTietDonHang() {
        echo '<pre>';
        print_r($_SESSION['user']);
        echo '<pre>';
        // if (!isset($_GET['id'])) {
        //     echo "Cần có ID đơn hàng.";
        //     return;
        // }

        // $orderId = $_GET['id'];
        // $orderDetail = $this->donhang->getOrderDetail($orderId);
        require_once "views/chiTietDonHang.php";
    }

    // public function huyDonHang() {
    //     if (!isset($_GET['id'])) {
    //         echo "Cần có ID đơn hàng để hủy.";
    //         return;
    //     }

    //     $orderId = $_GET['id'];
    //     $result = $this->donhang->cancelOrder($orderId);

    //     if ($result) {
    //         echo "Đơn hàng đã được hủy thành công.";
    //     } else {
    //         echo "Hủy đơn hàng thất bại.";
    //     }
    // }
}
?>
