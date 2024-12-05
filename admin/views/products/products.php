<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | E Shopper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "./views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <!-- HEADER & SIDEBAR -->
        <?php
        require_once "./views/layouts/header.php";
        require_once "./views/layouts/siderbar.php";
        ?>

        <!-- Main Content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex justify-content-between">
                                    <h4 class="card-title mb-0 flex-grow-1">Products</h4>
                                    <a href="?act=add-product" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i> Add Product</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                            <tbody>
                                                <?php if (!empty($products) && is_array($products)) : ?>
                                                    <?php foreach ($products as $product) : ?>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                        <img src="../admin/assets/images/<?= $product['image'] ?>" alt="Product Image" class="img-fluid d-block" />
                                                                    </div>
                                                                    <div>
                                                                        <h5 class="fs-14 my-1">
                                                                            <a href="apps-ecommerce-product-details.html" class="text-reset"><?= ($product['name']) ?></a>
                                                                        </h5>
                                                                        <span class="text-muted"><?= ($product['description']) ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal"><?= ($product['id_cate']) ?></h5><span class="text-muted">ID_Category</span>
                                                            </td>
                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal">$<?= ($product['price']) ?></h5><span class="text-muted">Price</span>
                                                            </td>
                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal"><?= ($product['quantity']) ?></h5><span class="text-muted">Quantity</span>
                                                            </td>
                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal"><?= ($product['create_at']) ?></h5><span class="text-muted">Create date</span>
                                                            </td>
                                                            <td>
                                                                <h5 class="fs-14 my-1 fw-normal"><?= ($product['update_at']) ?></h5><span class="text-muted">Update date</span>
                                                            </td>
                                                            <td>
                                                                <div class="hstack gap-3 flex-wrap">
                                                                    <a href="?act=update-product&id=<?= ($product['id_pro']) ?>" class="link-success fs-15" aria-label="Edit Product"><i class="ri-edit-2-line"></i></a>
                                                                    <a href="?act=delete-product&id=<?= ($product['id_pro']) ?>" class="link-danger fs-15" aria-label="Delete Product"><i class="ri-delete-bin-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">No products found.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>

                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <div class="row mt-4 pt-2 align-items-center justify-content-between">
                                        <div class="col-sm text-muted">
                                            Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">25</span> Results
                                        </div>
                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <ul class="pagination pagination-separated pagination-sm mb-0">
                                                <li class="page-item disabled"><a href="#" class="page-link" aria-label="Previous">←</a></li>
                                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                                <li class="page-item active"><a href="#" class="page-link">2</a></li>
                                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                                <li class="page-item"><a href="#" class="page-link" aria-label="Next">→</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End row -->
                </div> <!-- End container-fluid -->
            </div> <!-- End page-content -->
        </div> <!-- End main content -->

        <!-- Footer -->
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