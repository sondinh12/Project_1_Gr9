<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Require file Common
require_once '../commons/env.php'; 
require_once '../commons/function.php'; 

// Require toàn bộ file Controllers
require_once './controllers/clientController.php';

// Require toàn bộ file Models
require_once './model/clientModel.php';
// Route
$act = $_GET['act'] ?? '/';
match ($act) {
    '/'                 => (new clientController())->home(),
    'login'             => (new clientController())->login(),
    'logout'            =>(new clientController())->logout(),
    'register'          =>(new clientController())->register(), 
    'editpass'          =>(new clientController())->updatePass(),
    'forgotpass'        =>(new clientController())->forgotPass(),
    'resetform'         =>(new clientController())->resetForm(),
    'resetpass'         =>(new clientController())->resetPass(),
    'profile'           =>(new clientController())->profileUser(),
    'updateuser'        =>(new clientController())->updateUser(),
    'cart'              =>(new clientController())->showCart(),
    'contact'           =>(new clientController())->contactShow(),
    'detail'            =>(new clientController())->detailShow(),
    'checkout'          =>(new clientController())->checkoutShow(),
    'shop'              =>(new clientController())->shopShow(),
    'addcart'           =>(new clientController())->addToCart(),     
    'deletecart'        =>(new clientController())->deleteToCart(),  
    'handleaction'      =>(new clientController())->handleCartAction(),
    'updatecart'        =>(new clientController())->updateToCart(),
    'checkoutpro'       =>(new clientController())->checkoutPro(),
    'placeorder'        =>(new clientController())->placeOrder(),
};