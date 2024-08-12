<?php
session_start(); // Đảm bảo rằng session được bắt đầu
include_once "../model/donhang.php";
$id_tk = $_SESSION['id_tk'] ?? null; // Hoặc $_GET['id_tk'] nếu muốn lấy từ URL

// Kiểm tra xem id_tk có hợp lệ không
if (!$id_tk) {
    echo 'Thông tin tài khoản không hợp lệ.';
    var_dump($_SESSION); // Xem nội dung session để debug
    exit;
}

// Lấy danh sách đơn hàng của người dùng
$listdonhang = load_donhang_user($id_tk);

// Xử lý yêu cầu xóa hoặc xác nhận đơn hàng
if (isset($_GET['action']) && isset($_GET['id_dh'])) {
    $id_dh = $_GET['id_dh'];
    $action = $_GET['action'];

    if ($action === 'delete') {
        delete_donhang($id_dh);
    } elseif ($action === 'confirm') {
        update_donhang($id_dh, 2); // Cập nhật trạng thái thành "Hoàn Thành" (2)
    }

    // Làm mới danh sách đơn hàng sau khi xử lý
    $listdonhang = load_donhang_user($id_tk);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Đơn Hàng</title>
    <link rel="stylesheet" href="../css/donhang.css">
    <!-- Thêm liên kết CDN của Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        // Hàm xác nhận xóa đơn hàng
        function confirmDelete(event) {
            // Ngăn chặn hành động mặc định của liên kết
            event.preventDefault();
            // Hiển thị hộp thoại xác nhận
            if (confirm("Bạn có chắc chắn muốn xóa đơn hàng này?")) {
                // Nếu người dùng xác nhận, chuyển hướng đến liên kết
                window.location.href = event.currentTarget.href;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <!-- Thêm nút quay về trang chủ -->
        <h2>Danh Sách Đơn Hàng Của Bạn</h2>
        <a href="http://localhost/DA1_NHOM2/index.php" class="btn-home">
            <i class="fas fa-home"></i> Về Trang Chủ
        </a>
        <div class="table-container">
            <table>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Đặt</th>
                    <th>Số Lượng</th>
                    <th>Giá Trị</th>
                    <th>Tình Trạng</th>
                    <th>Thao Tác</th>
                </tr>
                <?php if (is_array($listdonhang) && count($listdonhang) > 0) : ?>
                    <?php foreach ($listdonhang as $donhang) : ?>
                        <tr>
                            <td><?= htmlspecialchars($donhang['id_dh']) ?></td>
                            <td><?= htmlspecialchars($donhang['ngay_dat']) ?></td>
                            <td><?= htmlspecialchars($donhang['so_luong']) ?></td>
                            <td><?= htmlspecialchars($donhang['tong_tien']) ?></td>
                            <td>
                                <?php
                                switch ($donhang['trangthai']) {
                                    case 0:
                                        echo 'Đơn Mới';
                                        break;
                                    case 1:
                                        echo 'Đang Giao';
                                        break;
                                    case 2:
                                        echo 'Hoàn Thành';
                                        break;
                                    case 3:
                                        echo 'Đã hủy';
                                        break;
                                    default:
                                        echo 'Không xác định';
                                        break;
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($donhang['trangthai'] == 0) : ?>
                                    <a href="?action=delete&id_dh=<?= htmlspecialchars($donhang['id_dh']) ?>" class="btn-action" title="Xóa" onclick="confirmDelete(event)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php elseif ($donhang['trangthai'] == 1) : ?>
                                    <a href="?action=confirm&id_dh=<?= htmlspecialchars($donhang['id_dh']) ?>" class="btn-action" title="Xác Nhận">
                                        <i class="fas fa-check"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="6">Bạn chưa có đơn hàng nào.</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>

