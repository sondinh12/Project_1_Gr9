<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="?act=resetpass" method="POST">
    <label for="token">Nhập mã OTP</label>
    <input type="text" name="token" id="token">
    <label for="new_pass">Mật khẩu mới:</label>
    <input type="password" id="new_pass" name="new_pass">
    <label for="re_pass">Nhập lại mật khẩu mới:</label>
    <input type="password" id="re_pass" name="re_pass">
    <button type="submit" name="btn_reset">Đặt lại mật khẩu</button>
    </form>
</body>
</html>