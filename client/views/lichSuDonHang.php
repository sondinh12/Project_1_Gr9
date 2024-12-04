<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Lịch sử mua hàng</h2>
        <form action="?act=cacel_orders" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không ?.')">
            <table class="table table-bordered mt-3">
                <thead>
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
                                    <?= $order['status'] === 'completed' ? 'Hoàn thành' : 'Đang xử lý'; ?>
                                </td>
                                <td>
                                    <a href="?act=chi-tiet-don-hang&id=<?= $order['id_orders'] ?>" class="btn btn-info btn-sm">Chi tiết</a>
                                    <input type="hidden" name="id" value="<?= $order['id_orders'] ?>">
                                    <button class=" btn btn-sm btn-danger" id="cancel_orders" name="btn_cancel_orders" type="submit">Hủy đơn</button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
