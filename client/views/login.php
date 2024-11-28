<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    form {
        background: #fff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }
    h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    label {
        font-size: 14px;
        color: #555;
        display: block;
        margin-bottom: 5px;
    }
    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }
    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #0056b3;
    }
    a {
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        color: #007bff;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

    
</head>
<body>
    <form action="" method="POST">
        <h3>Đăng nhập</h3>
        <label for="">Tên đăng nhập</label>
        <input type="text" name="user_name" id="user_login" placeholder="Nhập tên tài khoản">
        <label for="">Mật khẩu</label>
        <input type="password" name="pass" id="pass_login" placeholder="Nhập mật khẩu">
        <button name="btn_login" type="submit">Đăng nhập</button>
        <a href="?act=forgotpass">Quên mật khẩu</a>
    </form>
</body>
</html>

<?php
    
?>