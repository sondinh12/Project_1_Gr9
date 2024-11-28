<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

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

                    <div class="row">
                        <div class="col">

                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Quản lý đơn hàng</h4>
                                </div>

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">ID Khách</th>
                                                        <th scope="col">Tên hàng</th>
                                                        <th scope="col">Tổng đơn hàng</th>
                                                        <th scope="col">Trạng thái</th>
                                                        <th scope="col">Phương thức thanh toán</th>
                                                        <th scope="col">Ngày tạo</th>
                                                        <th scope="col">Ngày cập nhật</th>
                                                        <th scope="col">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($donhangs as $key => $donhang): ?>
                                                        <tr>
                                                            <td class="fw-medium"><?= $key + 1 ?></td>
                                                            <td><?= $donhang['id_us'] ?></td>
                                                            <td><?= $donhang['name_us'] ?></td>
                                                            <td><?= number_format($donhang['total'], 0, ',', '.') ?> VNĐ</td>
                                                            <td>
                                                                <?php
                                                                echo $donhang['status'] == 1
                                                                    ? '<span class="badge bg-success">Đang chờ duyệt</span>'
                                                                    : ($donhang['status'] == 2
                                                                        ? '<span class="badge bg-success">Đã xác nhận</span>'
                                                                        : ($donhang['status'] == 3
                                                                            ? '<span class="badge bg-success">Đang vận chuyển</span>'
                                                                            : '<span class="badge bg-success">Đã giao</span>'));
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($donhang['payment'] == 1) {
                                                                    echo '<span class="badge bg-success">Thanh toán khi nhận hàng</span>';
                                                                } elseif ($donhang['payment'] == 2) {
                                                                    echo '<span class="badge bg-danger">Đã thanh toán</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-warning">Không xác định</span>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= $donhang['create_at'] ?? 'Không có dữ liệu' ?></td>
                                                            <td><?= $donhang['update_at'] ?? 'Không có dữ liệu' ?></td>
                                                            <td>
                                                                <a href="?act=form-sua-don-hang&id_orders=<?= $donhang['id_orders'] ?>"
                                                                    class="btn btn-soft-success">
                                                                    <i class="ri-edit-2-line"></i>
                                                                </a>
                                                                <a href="?act=chi-tiet-don-hang&id_orders=<?= $donhang['id_orders'] ?>"
                                                                    class="btn btn-soft-success">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end col -->
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