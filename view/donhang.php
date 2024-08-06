<?php
include_once '../model/hoadon.php';

// Kiểm tra xem ID đơn hàng có được truyền vào không
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID đơn hàng không hợp lệ hoặc không được truyền vào.");
}

$id_dh = intval($_GET['id']); // Chuyển đổi ID thành số nguyên

// Lấy thông tin đơn hàng
$donhang = load_donhang($id_dh);

if ($donhang === null) {
    die("Không tìm thấy đơn hàng với ID: $id_dh");
}

// Lấy chi tiết đơn hàng
$sanpham = load_chitiet_donhang($id_dh);

if ($sanpham === null) {
    $sanpham = []; // Đảm bảo biến $sanpham là một mảng, ngay cả khi không có dữ liệu
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
</head>
<body>
    <h1>Chi Tiết Đơn Hàng</h1>
    
    <p><strong>Ngày đặt:</strong> <?php echo htmlspecialchars($donhang['ngay_dat']); ?></p>
    <p><strong>Người đặt:</strong> <?php echo htmlspecialchars($donhang['ten_nd']); ?></p>
    <p><strong>SĐT:</strong> <?php echo htmlspecialchars($donhang['sdt']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($donhang['email']); ?></p>
    <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($donhang['dia_chi']); ?></p>
    <p><strong>Trạng thái:</strong> <?php echo htmlspecialchars($donhang['trangthai']); ?></p>

    <h2>Chi Tiết Sản Phẩm</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sanpham as $sp): ?>
                <tr>
                    <td><?php echo htmlspecialchars($sp['ten_sp']); ?></td>
                    <td><?php echo htmlspecialchars($sp['gia']); ?></td>
                    <td><?php echo htmlspecialchars($sp['sl']); ?></td>
                    <td><?php echo htmlspecialchars($sp['tongtien']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
