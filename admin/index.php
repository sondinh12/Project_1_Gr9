<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/DashboardController.php';


require_once 'controllers/DanhMucController.php';
require_once 'controllers/CommentController.php';

// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/Comment.php';

require_once './controllers/DanhMucController.php';

require_once 'controllers/DonHangController.php';

require_once 'controllers/ProductsAdminController.php';


// Require toàn bộ file Models
require_once './models/DanhMuc.php';



require_once 'models/DonHang.php';


require_once './controllers/ProductsAdminController.php';

// Require toàn bộ file Models
require_once './model/Products.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards

    '/'                => (new DashboardController())->index(),
    //quản lý dm sp
    'danh-mucs'  => (new DanhMucController())->listCategory(),
    'form-them-danh-muc'  => (new DanhMucController())->create(),
    'them-danh-muc'  => (new DanhMucController())->store(),
    'form-sua-danh-muc'  => (new DanhMucController())->edit(),
    'sua-danh-muc'  => (new DanhMucController())->update(),
    'xoa-danh-mucs'  => (new DanhMucController())->destroy(),

    // '/'            => (new DashboardController())->index(),
    'product'      => (new ProductsController())->list(),
    'delete-product'       => (new ProductsController())->delete(),
    'add-product'       => (new ProductsController())->add(),
    'store-product'       => (new ProductsController())->store(),
    'update-product'       => (new ProductsController())->edit(),


    'comments' => (new CommentController())->listComments(),
    'delete-comment' => (new CommentController())->deleteComment($_GET['id_cmt'] ?? 0),
    'add-comment' => (new CommentController())->addComment($_POST),
    


    // quan li don hang
    'don-hang'      => (new DonHangController())->danhSachDonHang(),
    'form-sua-don-hang'      => (new DonHangController())->formEditDonHang(),
    'sua-don-hang'      => (new DonHangController())->postDonHang(),
    // 'chi-tiet-don-hang'      => (new DonHangController())->DetailData(),

};


