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
        $donhang = $this->donhang->DetailData($id); 
        require_once './views/donhang/editDonHang.php';
    }

    // Hàm cập nhật
    public function postDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_orders = $_POST['id_orders'];
            $trang_thai = $_POST['status'];
            $update_at = date('Y-m-d H:i:s');

            // Gọi phương thức cập nhật
            $result = $this->donhang->updateData($id_orders, $trang_thai,  $update_at);
            // var_dump($_REQUEST);die;

            if ($result) {
                // Cập nhật thành công
                header('Location: ?act=don-hang');
                // var_dump($result);
                exit();
            } else {
                // Xử lý lỗi cập nhật
                $_SESSION['errors'] = 'Cập nhật thất bại. Vui lòng thử lại.';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    // Hàm hiển thị chi tiết đơn hàng
public function DetailDonHang()
{
    // Lấy id đơn hàng từ tham số URL
    $id = $_GET['id_orders'];

    // Lấy thông tin chi tiết đơn hàng từ model
    $order_data = $this->donhang->DetailDon($id);

    // Kiểm tra nếu dữ liệu trả về là hợp lệ
    if ($order_data) {
        $order = $order_data['order'];
        require_once './views/donhang/detailDonHang.php';
    } else {
        $_SESSION['errors'] = 'Không tìm thấy đơn hàng!';
        header('Location: ?act=don-hang');
        exit();
    }
}

}
