<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="../client/assets/img/favicon.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../eshopper-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../client/assets/css/style.css" rel="stylesheet">
    <?php

    ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100" style="height: 210px; overflow-y: auto;">
                        <?php foreach ($categories as $category): ?>
                            <a href="index.php?act=product_in_category&category_id=<?= $category['category_id'] ?>"
                                class="btn btn-primary">
                                <?= htmlspecialchars($category['cate_name']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="index.php?act=list-product" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                            if (isset($_SESSION['user_name'])) {
                                $user_name = $_SESSION['user_name'];
                                ?>
                                <span class="nav-link nav-item">Xin chào <?= $user_name ?></span>
                                <a href="?act=logout" class="nav-item nav-link">Log Out</a>
                                <a href="?act=editpass" class="nav-item nav-link">EditPass</a>
                                <?php
                                if (isset($_SESSION['role']) && $_SESSION['role'] === 1) {
                                    ?>
                                    <a href="" class="nav-item nav-link">Đăng nhập Admin</a>
                                    <?php
                                }
                                ?>
                                <?php
                            } else {
                                ?>
                                <a href="?act=login" class="nav-item nav-link">Login</a>
                                <a href="?act=register" class="nav-item nav-link">Register</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../admin/assets/images/<?= htmlspecialchars($product['image']) ?>"
                    class="img-fluid border border-color:gray" alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
            <div class="col-md-6">
                <h2><?= htmlspecialchars($product['name']) ?></h2>
                <p><strong>Giá: $<?= htmlspecialchars($product['price']) ?></strong></p>
                <p><strong>Số Lượng: <?= htmlspecialchars($product['quantity']) ?></strong></p>
                <p><strong>Mô tả:</strong></p>
                <p><?= htmlspecialchars($product['description']) ?></p>
                <input type="number" class="btn btn-primary btn-lg form-control w-50" id="counter" value="1" min="1">
                <button class="btn btn-primary btn-lg">Add to Cart</button>
            </div>
        </div>
    </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-4">Comment</h4>
                <?php
                foreach ($comments as $key => $comment) {
                    ?>
                    <div class="media mb-4">
                        <div class="media-body w-full">
                            <h6><small><i>Ngày bình luận:
                                        <?php echo date('d/m/Y', strtotime($comment['date'])) ?>
                                    </i></small></h6>
                            <p>
                                <?php echo $comment['content']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>



            </div>
            <div class="col-md-6">
                <h4 class="mb-4">Leave a review</h4>
                <small>Your email address will not be published. Required fields are marked *</small>
                <form method="post" action="?act=add_commet">
                    <input type="text" name="id_pro" value="<?php echo $_GET['id']; ?>" hidden>
                    <div class="form-group">
                        <label for="message">Your Review *</label>
                        <textarea id="message" name="content" cols="30" rows="5" class="form-control"
                            required></textarea>
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Related Products Section -->
    <div class="container mt-5">
        <h3>Related Products</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text text-danger">$29.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text text-danger">$39.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text text-danger">$19.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Product 4</h5>
                        <p class="card-text text-danger">$24.99</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require_once './views/layout/footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>