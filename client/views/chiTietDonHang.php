<div class="container mt-5">
    <h2 class="text-center">Chi tiết đơn hàng</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $item) { ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
