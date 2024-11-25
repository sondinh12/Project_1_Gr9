<?php
class DonHangController
{
    // Kết nối đến model
    public $donhang;
    public function __construct()
    {
        $this->donhang = new DonHang();
    }

    // Hàm hiển thị danh sách
    public function danhSachDonHang()
    {
        $donhangs = $this->donhang->getAll();
        require_once './views/donhang/donhangs.php';
    }

    // Hàm hiển thị form sửa
    public function formEditDonHang()
    {
        $id = $_GET['id_orders']; 
        $donhang = $this->donhang->getDetailData($id); 
        require_once './views/donhang/editDonHang.php';
    }

    // Hàm cập nhật
    public function postDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_orders = $_POST['id_orders'];
            $trang_thai = $_POST['status'];
            $phuong_thuc_thanh_toan = $_POST['payment'];
            $update_at = date('Y-m-d H:i:s');

            // Gọi phương thức cập nhật
            $result = $this->donhang->updateData($id_orders, $trang_thai, $phuong_thuc_thanh_toan, $update_at);
            // var_dump($_REQUEST);die;

            if ($result) {
                // Cập nhật thành công
                header('Location: ?act=don-hang');
                exit();
            } else {
                // Xử lý lỗi cập nhật
                $_SESSION['errors'] = 'Cập nhật thất bại. Vui lòng thử lại.';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
