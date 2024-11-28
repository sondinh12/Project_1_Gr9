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

/* Tiêu đề của form */
form h3 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Nhãn (label) */
form label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 5px;
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

/* Nút đăng ký */
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

/* Nút reset */
form button[type="reset"] {
    background-color: #6c757d;
}

form button[type="reset"]:hover {
    background-color: #5a6268;
}

    </style>
    
</head>
<body>
    <form action="" method="POST">
        <h3>Đăng ký</h3>
        <label for="">Tên tài khoản</label>
        <input type="text" name="user_name" id="name_user_rg" placeholder="Nhập tên tài khoản">
        <label for="">Mật khẩu</label>
        <input type="password" name="pass" id="pass_rg" placeholder="Nhập mật khẩu">
        <label for="">Email</label>
        <input type="text" name="email" id="email_rg" placeholder="Nhập Email">
        <label for="">Phone</label>
        <input type="text" name="phone" id="phone_rg" placeholder="Nhập Số ĐT">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" id="address_rg" placeholder="Nhập địa chỉ">
        <button type="submit" name="btn_register">Đăng ký</button>
        <button type="reset">Nhập lại</button>
    </form>
</body>
</html>