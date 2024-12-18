
<?php

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');


// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/clientController.php';
require_once './controllers/clientProductController.php';
require_once './controllers/clientDonhang.php';
require_once './controllers/clientCommentController.php';


// Require toàn bộ file Models

require_once './model/clientModel.php';
require_once './model/clientCategory.php';
require_once './model/clientProduct.php';
require_once './model/donhang.php';
require_once './model/clientComment.php';




// Route
$act = $_GET['act'] ?? '/';
// var_dump($_SESSION);
match ($act) {


    // Trang chủ  

    '/'                 => (new ClientProductController())->index(),
    'login'             => (new clientController())->login(),
    'logout'            => (new clientController())->logout(),
    'register'          => (new clientController())->register(),
    'editpass'          => (new clientController())->updatePass(),
    'forgotpass'        => (new clientController())->forgotPass(),
    'resetform'         => (new clientController())->resetForm(),
    'resetpass'         => (new clientController())->resetPass(),


    // Sản phẩm

    'list-product'      => (new clientProductController())->list_product(),


    // 'list-product'      =>(new clientProductController())->list_product(),


    'product_in_category' => (new clientProductController())->list(),
    'detail_product'    => (new ClientProductController())->detail(),
    'profile'           => (new clientController())->profileUser(),
    'updateuser'        => (new clientController())->updateUser(),
    'cart'              => (new clientController())->showCart(),
    'contact'           => (new clientController())->contactShow(),
    // 'detail'            =>(new clientController())->detailShow(),
    'checkout'          => (new clientController())->checkoutShow(),
    'shop'              => (new ClientProductController())->list_product(),
    'addcart'           => (new clientController())->addToCart(),
    'deletecart'        => (new clientController())->deleteToCart(),
    'handleaction'      => (new clientController())->handleCartAction(),
    'updatecart'        => (new clientController())->updateToCart(),
    'add_commet'          => (new ClientCommentController())->addComment(),

    // Trang chủ


    // '/'                   => (new ClientProductController())->index(),
    // 'login'               => (new clientController())->login(),
    // 'logout'              => (new clientController())->logout(),
    // 'register'            => (new clientController())->register(),
    // 'editpass'            => (new clientController())->updatePass(),
    // //Đang sửa
    // 'forgotpass'          => (new clientController())->forgotPass(),
    // 'resetform'           => (new clientController())->resetForm(),
    // 'resetpass'           => (new clientController())->resetPass(),
    // Sản phẩm

    // 'list-product'        => (new clientProductController())->list_product(),
    // 'product_in_category' => (new clientProductController())->list(),
    // 'detail_product'      => (new ClientProductController())->detail(),
    // 'add_commet'          => (new ClientCommentController())->addComment(),
    'search_product'      => (new ClientProductController())->searchProduct(),



    // lich su don hang
    'lich-su-don-hang'  => (new ClientDonHang())->lichSuDonHang(),
    'chi-tiet-don-hang' => (new ClientDonHang())->chiTietDonHang(),
    'cacel_orders'      =>(new ClientDonhang())->huyDonHang(),

    'checkoutpro'       =>(new clientController())->checkoutPro(),

    'placeorder'        =>(new clientController())->placeOrder(),

};
?>

