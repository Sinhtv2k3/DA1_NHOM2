<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
    /* Đặt font chữ, màu nền, và căn giữa nội dung của trang */
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-wrapper {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    width: 500px;
    box-sizing: border-box;
}

.form-wrapper h2 {
    margin-bottom: 20px;
    text-align: center;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

p a {
    color: #007bff;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>
    <div class="form-wrapper">
        <h2>Đăng Nhập</h2>

        <?php 
        if(isset($_SESSION['username'])){
            extract($_SESSION['username']);
        ?>
         <div class="form-group">
                xin chao <br>
                <?$ten?>
            </div>
            <div class="form-group">
            <p><a href="edit.php">Quên mật khẩu</a></p>   
            <p><a href="edit.php">Cập nhật tài khoản</a></p>
            <p><a href="admin/index.php">Đăng nhập Admin</a></p>
            <p><a href="dangki.php">Thoát</a></p>  
            </div>
        <?php
        }else{

        }
        ?>
        <form action="http://localhost/DA1_NHOM2-master/index.php?=act-login.php" method="POST">
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Đăng Nhập</button>
        </form>
        <p><a href="dangki.php">Chưa có tài khoản? Đăng ký</a></p>
    </div>
</body>
</html>
