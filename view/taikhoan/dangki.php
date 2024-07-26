<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../../css/taikhoan.css">
    <script>
        // Chuyển hướng sau 2 giây
        function redirectToLogin() {
            setTimeout(function() {
                window.location.href = '/DA1_NHOM2/view/taikhoan/dangnhap.php';
            }, 2000);
        }

        window.onload = function() {
            <?php if (isset($_SESSION['register_message'])): ?>
                redirectToLogin();
            <?php endif; ?>
        }
    </script>
</head>
<body>
    <div class="form-wrapper">
        <h2>Đăng Ký</h2>
        <form action="/DA1_NHOM2/index.php?act=dangky" method="POST">
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
            <button type="submit" name="dangky">Đăng Ký</button>
        </form>
        <p><a href="/DA1_NHOM2/view/taikhoan/dangnhap.php">Đã có tài khoản? Đăng nhập</a></p>

        <?php
        if (isset($_SESSION['register_error'])) {
            echo '<p style="color: red;">' . $_SESSION['register_error'] . '</p>';
            unset($_SESSION['register_error']);
        }

        if (isset($_SESSION['register_message'])) {
            echo '<p>' . $_SESSION['register_message'] . '</p>';
            unset($_SESSION['register_message']); 
        }
        ?>
    </div>
</body>
</html>
