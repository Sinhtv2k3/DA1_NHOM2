<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh Toán</title>
</head>
<body>
    <h1>Thanh Toán</h1>
    
    <!-- Hiển thị nội dung giỏ hàng -->
    <table border="1">
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php
        // Hiển thị giỏ hàng
        foreach ($_SESSION['myCart'] as $item) {
            echo "<tr>";
            echo "<td><img src='{$item['image']}' alt='{$item['name']}' width='100'></td>";
            echo "<td>{$item['name']}</td>";
            echo "<td>{$item['price']}</td>";
            echo "<td>{$item['quantity']}</td>";
            echo "<td>" . ($item['price'] * $item['quantity']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <!-- Form đặt hàng -->
    <form method="POST" action="">
        <h2>Thông tin đặt hàng</h2>
        <label for="name">Họ tên:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required>
        <br>
        <button type="submit" name="checkout">Xác Nhận Đặt Hàng</button>
    </form>
</body>
</html>
