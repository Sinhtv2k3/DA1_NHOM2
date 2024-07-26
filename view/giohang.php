<?php
session_start();
$cart = isset($_SESSION['myCart']) ? $_SESSION['myCart'] : [];
$img_path = "../upload/";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="../css/giohang.css">
</head>

<body>
    <?php
    
    ?>
    <h1>Giỏ Hàng</h1>
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
        $tong = 0;
        foreach ($cart as $item) {
            if (isset($item[2], $item[1], $item[3], $item[4])) {
                $anh = $img_path . $item[2]; 
                $ttien = $item[3] * $item[4];
                $tong += $ttien;
                echo '<tr>
                    <td><img src="' . htmlspecialchars($anh) . '" alt="Ảnh sản phẩm"></td>
                    <td>' . htmlspecialchars($item[1]) . '</td>
                    <td>' . number_format($item[3]) . ' VND</td>
                    <td>' . $item[4] . '</td>
                    <td>' . number_format($ttien) . ' VND</td>
                    <td><a href="index.php?act=remove_from_cart&id=' . urlencode($item[0]) . '">Xóa</a></td>
                </tr>';
            }
        }
        echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td colspan="2">' . number_format($tong) . ' VND</td>
        </tr>';
        ?>
    </table>
    <form class="checkout-form" action="index.php?act=checkout" method="POST">
    <h2>Thông Tin Đặt Hàng</h2>
    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="sdt">Số điện thoại:</label>
    <input type="tel" id="sdt" name="sdt" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <label for="address">Địa Chỉ:</label>
    <input type="text" id="address" name="address" required><br>
    <button type="submit">Xác Nhận Đặt Hàng</button>
</form>


</body>

</html>
