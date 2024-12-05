<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .list-group-item-action {
            transition: background-color 0.3s ease;
        }
        .list-group-item-action:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
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
                        <a class="nav-link" href="?act=shop">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?act=logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-3">
                <div class="list-group">
                    <a href="?act=profile" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
                    <a href="?act=lich-su-don-hang" class="list-group-item list-group-item-action">Đơn hàng</a>
                    <a href="?act=editpass" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Hỗ trợ</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h3 class="text-center">Đổi mật khẩu</h3>
                <div class="form-container">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="old_pass" class="form-label">Mật khẩu hiện tại:</label>
                            <input type="password" id="old_pass" name="old_pass" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_pass" class="form-label">Mật khẩu mới:</label>
                            <input type="password" id="new_pass" name="new_pass" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="re_pass" class="form-label">Nhập lại mật khẩu mới:</label>
                            <input type="password" name="re_pass" id="re_pass" class="form-control" required>
                        </div>
                        <button type="submit" name="btn_editpass" class="btn btn-primary w-100">Đổi mật khẩu</button>
                    </form>
                </div>                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
