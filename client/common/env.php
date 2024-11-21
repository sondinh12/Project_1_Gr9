<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/Project_1/client/');    
// define('BASE_URL_ADMIN'       , 'http://localhost/Project_1/client/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3307);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'db');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
