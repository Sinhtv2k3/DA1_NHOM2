<?php
session_start();
include_once "../model/hoadon.php";

// Kiểm tra nếu người dùng chưa đăng nhập hoặc giỏ hàng rỗng thì không cho phép truy cập
if (!isset($_SESSION['myCart']) || empty($_SESSION['myCart'])) {
    header('Location: giohang.php');
    exit;
}

// Lấy thông tin người dùng nếu đã đăng nhập
$ten = $_SESSION['user']['ten'] ?? "";
$sdt = $_SESSION['user']['sdt'] ?? "";
$email = $_SESSION['user']['email'] ?? "";
$dia_chi = $_SESSION['user']['dia_chi'] ?? "";
$id_tk = $_SESSION['user']['id_tk'] ?? "";

// Xử lý đặt hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    $ngay_dat = date('Y-m-d');
    $ten_nd = $_POST['name'];
    $sdt = $_POST['phone'];
    $email = $_POST['email'];
    $dia_chi = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $id_tk = $_POST['id_tk'];

    try {
        // Tạo đơn hàng
        $order_id = create_order($ten_nd, $sdt, $email, $dia_chi, $payment_method, $id_tk);

        // Thêm các sản phẩm vào bảng chi tiết đơn hàng
        foreach ($_SESSION['myCart'] as $product) {
            insert_chitiet_donhang($order_id, $product[0], $product[1], $product[3], $product[4], $product[3] * $product[4], $id_tk);
        }

        // Thông báo thành công và chuyển hướng
        echo '<script>alert("Đặt hàng thành công!"); window.location.href = "success.php";</script>';
        exit();
    } catch (Exception $e) {
        // Thông báo lỗi và giữ lại trang bill.php
        echo '<script>alert("Có lỗi xảy ra: ' . addslashes($e->getMessage()) . '"); window.location.href = "bill.php";</script>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt Hàng</title>
    <link rel="stylesheet" href="../css/bill.css">
    <script>
        function updateQRCodeDisplay() {
            var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            var qrCodeImg = document.getElementById('qr-code');

            if (paymentMethod === 'transfer') {
                qrCodeImg.style.display = 'block';
            } else {
                qrCodeImg.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            paymentMethodRadios.forEach(function(radio) {
                radio.addEventListener('change', updateQRCodeDisplay);
            });

            updateQRCodeDisplay();
        });
    </script>
</head>
<body>
    <h1>Thông Tin Đặt Hàng</h1>
    <form method="POST" action="bill.php">
        <input type="hidden" name="id_tk" value="<?php echo htmlspecialchars($id_tk); ?>">
        
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($ten); ?>" required><br>
        
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($sdt); ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>
        
        <label for="address">Địa Chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($dia_chi); ?>" required><br>
        
        <h2>Hình Thức Thanh Toán</h2>
        <label for="payment_cash">
            <input type="radio" id="payment_cash" name="payment_method" value="cash" checked>
            Trả tiền mặt
        </label><br>
        <label for="payment_transfer">
            <input type="radio" id="payment_transfer" name="payment_method" value="transfer">
            Chuyển khoản
        </label><br>
        
        <!-- <img id="qr-code" src="../upload/4128Nh_2021-06-15_Lu.jpeg" alt="QR Code" style="display: none; width: 200px; height: 200px;">
        <img id="qr-code" src="../upload/MinhBao-1-878x1024.png" alt="QR Code" style="display: none; width: 200px; height: 200px;"> -->
        <img id="qr-code" src="../upload/453507250_1326174345212710_5500500719759951119_n (1).jpg" alt="QR Code" style="display: none; width: 200px; height: 200px;">
        
        <button type="submit" name="confirm">Đặt hàng</button>
    </form>
</body>
</html>
