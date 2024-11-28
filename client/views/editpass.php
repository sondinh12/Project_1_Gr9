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
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

/* Tiêu đề của form */
h3 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
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

/* Các nhãn của input */
form label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-size: 14px;
}

/* Các ô nhập liệu */
form input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    margin-bottom: 15px;
    transition: border-color 0.3s ease;
}

/* Khi ô nhập được chọn */
form input:focus {
    border-color: #007bff;
    outline: none;
}

/* Nút bấm đổi mật khẩu */
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