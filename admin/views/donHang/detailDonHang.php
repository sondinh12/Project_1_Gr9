<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<style>
    /* General Reset */
body, h1, h2, h3, h4, h5, h6, p, a {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

/* Layout Wrapper */
#layout-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Header */
header {
    background-color: #007bff;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
}

/* Sidebar */
.sidebar {
    background-color: #343a40;
    color: white;
    width: 250px;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.sidebar a {
    text-decoration: none;
    color: white;
    padding: 10px 15px;
    margin: 5px 0;
    border-radius: 4px;
    display: block;
    transition: all 0.3s;
}

.sidebar a:hover {
    background-color: #007bff;
}

/* Main Content */
.main-content {
    margin-left: 260px;
    padding: 20px;
    flex: 1;
}

/* Content Container */
.container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.container h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #007bff;
}

.container h4 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #343a40;
}

.container p {
    margin-bottom: 10px;
    font-size: 16px;
}

.container p strong {
    color: #007bff;
}

/* Buttons */
.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Footer */
footer {
    background-color: #343a40;
    color: white;
    padding: 10px 20px;
    text-align: center;
    font-size: 14px;
    margin-top: auto;
}

/* Back to Top */
#back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 12px 15px;
    border: none;
    border-radius: 50%;
    background-color: #dc3545;
    color: white;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    display: none; /* Initially hidden */
}

#back-to-top:hover {
    background-color: #b02a37;
}

/* Media Queries */
@media screen and (max-width: 768px) {
    .main-content {
        margin-left: 0;
        padding: 10px;
    }

    .sidebar {
        width: 100%;
        position: relative;
    }

    .container {
        padding: 15px;
    }

    footer {
        text-align: center;
    }
}

</style>
<head>
    <meta charset="utf-8" />
    <title>Quản lý Đơn hàng | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý đơn hàng NN Shop" name="description" />
    <meta content="NN Shop Team" name="author" />

    <!-- CSS -->
    <?php require_once "./views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "./views/layouts/header.php";
        require_once "./views/layouts/siderbar.php";
        ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="container">
                        <h3>Chi tiết đơn hàng #<?= $order['id_orders'] ?></h3>

                        <h4>Thông tin đơn hàng</h4>
                        <p><strong>ID Khách:</strong> <?= $order['id_us'] ?></p>
                        <p><strong>Tên khách hàng:</strong> <?= $order['name_us'] ?></p>
                        <p><strong>Tổng đơn hàng:</strong> <?= number_format($order['total'], 0, ',', '.') ?> VNĐ</p>
                        <p><strong>Trạng thái:</strong>
                            <?= $order['status'] == 1 ? 'Đang chờ duyệt' : ($order['status'] == 2 ? 'Đã xác nhận' : ($order['status'] == 3 ? 'Đang vận chuyển' : 'Đã giao')) ?>
                        </p>
                        <p><strong>Phương thức thanh toán:</strong> <?= $order['payment'] == 1 ? 'Thanh toán khi nhận hàng' : 'Đã thanh toán' ?></p>
                        <p><strong>Ngày tạo:</strong> <?= $order['create_at'] ?></p>
                        <p><strong>Ngày cập nhật:</strong> <?= $order['update_at'] ?></p>

                        <a href="?act=don-hang" class="btn btn-primary">Trở lại</a>
                    </div>

                </div>

            </div> <!-- container-fluid -->
        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © NN Shop.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by NN Shop Team
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <!-- Back to Top -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- JavaScript -->
    <?php require_once "./views/layouts/libs_js.php"; ?>
</body>

</html>