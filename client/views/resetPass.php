<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Thiết lập chung cho toàn bộ trang */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Form chính */
form {
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

/* Nhãn (label) */
form label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 8px;
}

/* Ô nhập liệu */
form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

/* Khi ô nhập liệu được chọn */
form input:focus {
    border-color: #007bff;
    outline: none;
}

/* Nút đặt lại mật khẩu */
form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* Khi rê chuột vào nút */
form button:hover {
    background-color: #0056b3;
}

    </style>
    
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