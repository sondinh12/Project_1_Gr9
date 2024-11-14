<?php 
session_start();
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
};