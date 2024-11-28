<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "./views/layouts/libs_css.php";
    ?>

</head>

<body>
    <div id="layout-wrapper">
        <!-- HEADER & SIDEBAR -->
        <?php
        require_once "./views/layouts/header.php";
        require_once "./views/layouts/siderbar.php";
        ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <br>
                    <h2>Thêm sản phẩm mới</h2>

                    <!-- Cập nhật form để hỗ trợ upload file -->
                    <form action="?act=store-product" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" id="price" name="price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>
                        </div>
                        <!-- Danh mục -->
                        <div class="form-group">
                            <label for="id_cate">Danh mục</label>
                            <select name="id_cate" class="form-select">
                                <option value="" selected disabled>Chọn danh mục</option>
                                <?php foreach ((new DanhMuc())->getAll() as $category) : ?>
                                    <option value="<?= $category['category_id'] ?>"><?= $category['cate_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="text-danger">
                                <?= !empty($_SESSION['errors']['id_cate']) ? $_SESSION['errors']['id_cate'] : '' ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Velzon.
                </div>
                <div class="col-sm-6 text-sm-end">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </footer>
    </div> <!-- End layout-wrapper -->

    <!-- Back-to-top Button -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top" aria-label="Back to Top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Theme Settings -->
    <div class="customizer-setting d-none d-md-block">
        <button class="btn btn-info rounded-pill shadow-lg btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas" aria-label="Theme Settings">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </button>
    </div>

    <!-- JavaScript -->
    <?php require_once "./views/layouts/libs_js.php"; ?>
</body>

</html>