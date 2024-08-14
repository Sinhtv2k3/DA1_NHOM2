<?php
session_start();
include_once "../model/cart.php";
include_once "../model/hoadon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý cập nhật số lượng giỏ hàng
    if (isset($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $index => $quantity) {
            if (isset($_SESSION['myCart'][$index])) {
                $_SESSION['myCart'][$index][4] = (int)$quantity; // Cập nhật số lượng
            }
        }
        header('Location: giohang.php'); // Quay lại trang giỏ hàng
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="../css/gh.css">
    <script>
        function updateTotal() {
            var total = 0;
            var rows = document.querySelectorAll('table tr[id^="item-"]');
            rows.forEach(function(row) {
                var quantity = parseInt(row.querySelector('.quantity').value);
                var price = parseFloat(row.querySelector('.item-price').textContent.replace(' VND', '').replace(',', ''));
                var itemTotal = row.querySelector('.item-total');
                var rowTotal = quantity * price;
                itemTotal.textContent = rowTotal.toLocaleString() + ' VND';
                total += rowTotal;
            });
            document.getElementById('total').textContent = total.toLocaleString() + ' VND';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var quantityInputs = document.querySelectorAll('.quantity');
            quantityInputs.forEach(function(input) {
                input.addEventListener('input', updateTotal);
            });
            updateTotal(); // Cập nhật tổng khi trang được tải

            function updateQRCodeDisplay() {
                var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
                var qrCodeImg = document.getElementById('qr-code');

                if (paymentMethod === 'transfer') {
                    qrCodeImg.style.display = 'block';
                } else {
                    qrCodeImg.style.display = 'none';
                }
            }

            var paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            paymentMethodRadios.forEach(function(radio) {
                radio.addEventListener('change', updateQRCodeDisplay);
            });

            updateQRCodeDisplay();
        });
    </script>
</head>
<body>
    
    <h1>Giỏ Hàng</h1>
    <form action="giohang.php" method="POST">
        <table>
            <tr>
                <th>Ảnh Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
                <th>Thao Tác</th>
            </tr>
            <?php
            viewcart(); // Gọi hàm viewcart() để hiển thị giỏ hàng
            ?>
            <tr>
                <td colspan="4">Tổng đơn hàng</td>
                <td colspan="2" id="total"><?php echo number_format($tong); ?> VND</td>
            </tr>
        </table>
        <a href="http://localhost/DA1_NHOM2/index.php" style="
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s ease;
        ">Quay Về Trang Chủ</a>
        <a href="bill.php" style="
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s ease;
        ">Tiến Hành Đặt Hàng</a>
    </form>
</body>
</html>
