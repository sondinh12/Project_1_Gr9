<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Nút quay lại -->
        <a href="?act=lich-su-don-hang" class="btn btn-info mb-4">Quay lại</a>

        <h3 class="mb-4">Chi Tiết Đơn Hàng</h3>

        <!-- Lặp qua từng sản phẩm trong đơn hàng -->
        <?php foreach ($orderDetails as $item) { ?>
        <div class="card mb-4 shadow-sm">
            <div class="row g-0">
                <!-- Ảnh sản phẩm -->
                <div class="col-md-3">
                    <img src="../admin/assets/images/<?= $item['image'] ?>" 
                        class="img-fluid rounded-start" alt="<?= $item['name'] ?>">
                </div>
                <!-- Thông tin sản phẩm -->
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name'] ?></h5>
                        <p class="card-text">
                            <strong>Số lượng:</strong> <?= $item['quantity'] ?><br>
                            <strong>Giá:</strong> <?= number_format($item['price'], 0, ',', '.') ?> VNĐ<br>
                            <strong>Số điện thoại:</strong> <?= $item['phone'] ?><br>
                            <strong>Địa chỉ:</strong> <?= $item['address'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- Thông báo nếu không có sản phẩm -->
        <?php if (empty($orderDetails)) { ?>
        <div class="alert alert-warning text-center">
            Không có sản phẩm nào trong đơn hàng này.
        </div>
        <?php } ?>
    </div>

</body>
</html>
