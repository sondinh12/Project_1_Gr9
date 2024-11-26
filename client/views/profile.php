<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .profile-header {
            background-color: #f8f9fa;
            padding: 30px 0;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-card {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .profile-details {
            margin-top: 20px;
        }
        .order-history {
            margin-top: 50px;
        }
        .order-history table th, .order-history table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E Shopper</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?act=/">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Section -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="profile-card card">
                    <img class="card-img-top profile-image mx-auto" src="https://via.placeholder.com/150" alt="Profile Image">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tên Người Dùng</h5>
                        <p class="card-text">Chức vụ: Founder</p>
                    </div>
                </div>

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
                    <a href="#" class="list-group-item list-group-item-action">Đơn hàng</a>
                    <a href="#" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Hỗ trợ</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Thông tin cá nhân -->
                <div class="profile-header text-center">
                    <h2>Thông tin cá nhân</h2>
                </div>
                <div class="profile-details">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Họ và tên:</h5>
                            <p><span id="fullName"><?=$info['name_user']?></span></p>
                        </div>
                        <div class="col-md-6">
                            <h5>Email:</h5>
                            <p><span id="email"></span><?=$info['email']?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Số điện thoại:</h5>
                            <p><span id="phone"><?=$info['phone']?></span></p>
                        </div>
                        <div class="col-md-6">
                            <h5>Địa chỉ:</h5>
                            <p><span id="address"><?=$info['address']?></span></p>
                        </div>
                    </div>
                </div>


                <!-- Cập nhật thông tin cá nhân -->
                <div class="update-profile mt-5">
                    <h3>Cập nhật thông tin cá nhân</h3>
                    <form method="post" action="?act=updateuser">
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="updateName" value="<?=$info['name_user']?>" name="user_name">
                        </div>
                        <div class="mb-3">
                            <label for="updateEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="updateEmail" value="<?=$info['email']?>" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="updatePhone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="updatePhone" value="<?=$info['phone']?>" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="updateAddress" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="updateAddress" value="<?=$info['address']?>" name="address">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_updateUs">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
