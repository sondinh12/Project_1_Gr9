<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Quản lý Đơn hàng | E Shopper</title>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Thống kê doanh thu</h4>
                                </div>                                  
                                <div style="margin-left: 16px">
                                    <form action="?act=statistics" method="post" class="mb-4">
                                        <label for="start_date">Từ ngày:</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control w-25 mb-2">

                                        <label for="end_date">Đến ngày:</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control w-25 mb-2">

                                        <button type="submit" class="btn btn-primary" name="btn_statistics">Xem thống kê</button>
                                    </form>

                                    <?php if (isset($data['total'])): ?>
                                        <h3>Kết quả thống kê từ <?= htmlspecialchars($_POST['start_date']) ?> đến <?= htmlspecialchars($_POST['end_date']) ?>:</h3>
                                        <p><strong>Doanh thu:</strong> $<?= htmlspecialchars(number_format($data['total'], 2)) ?></p>
                                        <p><strong>Tổng số đơn hàng:</strong> <?= htmlspecialchars($data['total_orders']) ?></p>
                                        <p><strong>Số đơn hàng bị hủy <?= htmlspecialchars($data['canceled_orders']) ?></strong></p>
                                    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                                        <p><strong>Hãy chọn ngày để xem thống kê.</strong></p>
                                    <?php endif; ?>
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
                            </script> © E Shopper.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by E Shopper Team
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