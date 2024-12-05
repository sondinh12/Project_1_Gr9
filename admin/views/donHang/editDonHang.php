<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập nhật danh mục| E Shopper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- Start right Content here -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">

                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Sửa đơn hàng</h4>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=sua-don-hang" method="Post" enctype="multipart/form-data">
                                            <div class="row">
                                                <!--end col-->
                                                <div class="text-center">
                                                    <div class="mb-3 form-group">
                                                        <label for="status" class="form-label">Trạng thái</label>
                                                        <select class="form-select" name="status" id="statusChange" onchange="handleStatusChange()">
                                                            <!-- <option disabled>Chọn trạng thái</option> -->
                                                            <option value="1" <?= $donhang['status'] == 1 ? 'selected' : '' ?>>Đang chờ duyệt</option>
                                                            <option value="2" <?= $donhang['status'] == 2 ? 'selected' : '' ?>>Đã xác nhận</option>
                                                            <option value="3" <?= $donhang['status'] == 3 ? 'selected' : '' ?>>Đang vận chuyển</option>
                                                            <option value="4" <?= $donhang['status'] == 4 ? 'selected' : '' ?>>Đã giao</option>
                                                            <option value="5" <?= $donhang['status'] == 5 ? 'selected' : '' ?>>Đã hủy</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['status']) ? $_SESSION['errors']['status'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                               
                                                <input type="hidden" name="id_orders" value="<?= $donhang['id_orders'] ?>">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                    <script>
                                        function handleStatusChange() {
                                            var previousStatus = <?php echo $donhang['status']; ?>;
                                            var statusSelect = document.getElementById("statusChange");
                                            var selectedValue = statusSelect.value;
                                            
                                            if (selectedValue === "5") {
                                                statusSelect.disabled = true;
                                            } else {
                                                
                                                if (selectedValue < previousStatus) {                                                
                                                    alert("Bạn không thể chọn trạng thái này.");
                                                    statusSelect.value = previousStatus;
                                                } else {
                                                    statusSelect.disabled = false;
                                                    previousStatus = selectedValue;
                                                }
                                            } 
                                            
                                        }

                                        handleStatusChange();
                                    </script>
                                </div>
                            </div>

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>