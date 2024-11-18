<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Đổi mật khẩu</h3>
    <form action="" method="POST">
        <label for="old_pass">Mật khẩu hiện tại:</label>
        <input type="password" id="old_pass" name="old_pass" required>
        <br><br>
        <label for="new_pass">Mật khẩu mới:</label>
        <input type="password" id="new_pass" name="new_pass" required>
        <br><br>
        <label for="re_pass">Nhập lại mật khẩu mới:</label>
        <input type="password" name="re_pass" id="re_pass">
        <br><br>
        <button type="submit" name="btn_editpass">Đổi mật khẩu</button>
    </form>
</body>
</html>