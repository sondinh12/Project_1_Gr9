<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
    <label for="new_pass">Mật khẩu mới:</label>
    <input type="password" id="new_pass" name="new_pass" required>
    <label for="re_pass">Nhập lại mật khẩu mới:</label>
    <input type="password" id="re_pass" name="re_pass" required>
    <button type="submit" name="btn_reset">Đặt lại mật khẩu</button>
    </form>
</body>
</html>