<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Đơn Hàng</title>
</head>
<body>
    <h1>Chi Tiết Đơn Hàng</h1>
    <?php if (isset($donhang) && is_array($donhang)): ?>
        <p>ID Đơn Hàng: <?php echo htmlspecialchars($donhang['id_hd']); ?></p>
        <p>Ngày Đặt: <?php echo htmlspecialchars($donhang['ngay_dat']); ?></p>
        <p>Trạng Thái: <?php echo htmlspecialchars($donhang['trang_thai']); ?></p>
        <p>Tổng Tiền: <?php echo htmlspecialchars(number_format($donhang['tong_tien'], 0, ',', '.')); ?></p>
        
        <h2>Chi Tiết Đơn Hàng</h2>
        <?php if (isset($chitiet_donhang) && is_array($chitiet_donhang) && count($chitiet_donhang) > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chitiet_donhang as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id_sp']); ?></td>
                            <td><?php echo htmlspecialchars($item['ten_sp']); ?></td>
                            <td><?php echo htmlspecialchars($item['so_luong']); ?></td>
                            <td><?php echo htmlspecialchars(number_format($item['gia'], 0, ',', '.')); ?></td>
                            <td><?php echo htmlspecialchars(number_format($item['thanh_tien'], 0, ',', '.')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Không có chi tiết nào để hiển thị.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Không tìm thấy đơn hàng.</p>
    <?php endif; ?>
</body>
</html>
