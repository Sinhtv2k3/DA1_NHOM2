<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../css/taikhoan.css">
</head>
<body>
<div class="form-wrapper">
        <h2>Đăng Ký</h2>
        <form action="index.php?act=dangki" method="POST">

            <div class="form-group">
                <label for="username">Tên người dùng:</label>   
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" name="dangki">Đăng Ký</button>
        </form>
        <p><a href="/login.php">Đã có tài khoản? Đăng nhập</a></p>
    </div>
</body>
</html>
