<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin-top: 20px;
        }
        .content-wrapper {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-sm {
            margin: 0 2px;
        }
        .btn-info {
            color: #fff;
        }
        .empty-orders {
            color: #6c757d;
            font-style: italic;
        }
        .list-group-item {
            font-size: 14px;
        }
        .nav-link.active {
            font-weight: bold;
            color: #007bff !important;
        }
        .sidebar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Header và Navbar -->
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

    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="list-group">
                    <a href="?act=profile" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
                    <a href="?act=lich-su-don-hang" class="list-group-item list-group-item-action active">Đơn hàng</a>
                    <a href="?act=editpass" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Hỗ trợ</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="content-wrapper">
                    <h2 class="text-center">Lịch sử mua hàng</h2>
                    
                        <table class="table table-bordered mt-3">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Ngày mua</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($orders)) { ?>
                                    <?php foreach ($orders as $key => $order) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= date('d/m/Y', strtotime($order['create_at'])) ?></td>
                                            <td><?= number_format($order['total'], 0, ',', '.') ?> VNĐ</td>
                                            <td>
                                                <span class="badge bg-<?= $order['status'] === 'completed' ? 'success' : 'warning'; ?>">
                                                    <?= $order['status'] === 'completed' ? 'Hoàn thành' : 'Đang xử lý'; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="?act=chi-tiet-don-hang&id=<?= $order['id_orders'] ?>" class="btn btn-info btn-sm">Chi tiết</a>
                                                <form action="?act=cacel_orders" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $order['id_orders'] ?>">
                                                <button class="btn btn-sm btn-danger" id="cancel_orders" name="btn_cancel_orders" type="submit">Hủy đơn</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5" class="text-center empty-orders">Bạn chưa có đơn hàng nào.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
