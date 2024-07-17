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
    background-color: #f8f9fa; /* Màu nền nhẹ nhàng cho toàn bộ trang */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Chiều cao toàn bộ cửa sổ trình duyệt */
    margin: 0; /* Xóa margin mặc định của body */
}

/* Định dạng hộp đăng ký */
.form-wrapper {
    background-color: #fff; /* Màu nền trắng cho hộp */
    padding: 20px; /* Khoảng cách bên trong hộp */
    border-radius: 5px; /* Bo tròn các góc của hộp */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Tạo hiệu ứng đổ bóng */
    width: 300px; /* Chiều rộng cố định của hộp */
}

/* Tiêu đề của hộp đăng ký */
.form-wrapper h2 {
    margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
    text-align: center; /* Canh giữa tiêu đề */
}

/* Định dạng nhóm các trường nhập liệu */
.form-group {
    margin-bottom: 15px; /* Khoảng cách dưới mỗi nhóm trường */
}

/* Định dạng nhãn của các trường nhập liệu */
.form-group label {
    display: block; /* Đảm bảo nhãn chiếm một dòng riêng */
    margin-bottom: 5px; /* Khoảng cách dưới nhãn */
    font-weight: bold; /* Đặt nhãn thành đậm */
}

/* Định dạng các trường nhập liệu */
.form-group input {
    width: 100%; /* Đặt chiều rộng của trường nhập liệu bằng với chiều rộng của nhóm */
    padding: 8px; /* Khoảng cách bên trong trường nhập liệu */
    border: 1px solid #ccc; /* Đường viền màu xám nhạt */
    border-radius: 4px; /* Bo tròn các góc của trường nhập liệu */
}

/* Định dạng nút gửi */
button {
    width: 100%; /* Đặt chiều rộng của nút bằng với chiều rộng của nhóm */
    padding: 10px; /* Khoảng cách bên trong nút */
    border: none; /* Xóa đường viền của nút */
    border-radius: 4px; /* Bo tròn các góc của nút */
    background-color: #007bff; /* Màu nền của nút */
    color: #fff; /* Màu chữ của nút */
    font-size: 16px; /* Kích thước chữ */
    cursor: pointer; /* Hiển thị con trỏ chuột kiểu tay khi di chuột qua nút */
}

/* Hiệu ứng khi di chuột qua nút */
button:hover {
    background-color: #0056b3; /* Màu nền khi di chuột qua nút */
}

/* Định dạng đoạn văn dưới form */
p {
    text-align: center; /* Canh giữa đoạn văn */
    margin-top: 10px; /* Khoảng cách trên đoạn văn */
}

/* Định dạng liên kết trong đoạn văn */
p a {
    color: #007bff; /* Màu chữ của liên kết */
    text-decoration: none; /* Xóa gạch dưới của liên kết */
}

/* Hiệu ứng khi di chuột qua liên kết */
p a:hover {
    text-decoration: underline; /* Thêm gạch dưới khi di chuột qua liên kết */
}

</style>
</head>
<body>
    <div class="form-wrapper">
        <h2>Đăng Nhập</h2>
        <form action="process_login.php" method="POST">
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
        <p><a href="register.php">Chưa có tài khoản? Đăng ký</a></p>
    </div>
</body>
</html>
