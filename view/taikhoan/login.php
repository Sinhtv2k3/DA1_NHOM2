<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="../../css/taikhoan.css">
</head>
<body>
    <div class="form-wrapper">
        <h2>Đăng Nhập</h2>
        <form action="/DA1_NHOM2/index.php?act=dangnhap" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="dangnhap">Đăng Nhập</button>
        </form>
        <p><a href="/DA1_NHOM2/view/taikhoan/dangki.php">Chưa có tài khoản? Đăng ký</a></p>
    </div>
</body>
</html>
