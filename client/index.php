<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> d8dd6eabdb9ce46c14bf9fad087f3e4d6945bbab
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');



// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/clientController.php';

// Require toàn bộ file Models

require_once './model/clientModel.php';
// Route
$act = $_GET['act'] ?? '/';
match ($act) {

    // Trang chủ
   

    '/'                 => (new clientController())->home(),
    'login'             => (new clientController())->login(),
    'logout'            =>(new clientController())->logout(),
    'register'          =>(new clientController())->register(), 
    'editpass'          =>(new clientController())->updatePass(),
    //Đang sửa
    'forgotpass'        =>(new clientController())->forgotPass(),
    'resetform'         =>(new clientController())->resetForm(),
    'resetpass'         =>(new clientController())->resetPass(),
<<<<<<< HEAD
=======

>>>>>>> d8dd6eabdb9ce46c14bf9fad087f3e4d6945bbab
};