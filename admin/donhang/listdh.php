<div class="row box">
    <?php include 'boxtrai.php'; ?>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>DANH SÁCH ĐƠN HÀNG</h2>
        </div>
        <div class="bangl">
            <table>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Khách Hàng</th>
                    <th>Số Lượng</th>
                    <th>Giá Trị</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Tình Trạng</th>
                    <th>Ngày Đặt</th>
                    <th>Thao Tác</th>
                </tr>
                <?php foreach ($listdonhang as $donhang) : ?>
                    <tr>
                        <td><?= htmlspecialchars($donhang['id_dh']) ?></td>
                        <td>
                            <?= htmlspecialchars($donhang['ten_nd']) ?><br>
                            <?= htmlspecialchars($donhang['sdt']) ?><br>
                            <?= htmlspecialchars($donhang['dia_chi']) ?><br>
                            <?= htmlspecialchars($donhang['email']) ?>
                        </td>
                        <td><?= htmlspecialchars($donhang['so_luong']) ?></td>
                        <td><?= htmlspecialchars($donhang['tong_tien']) ?></td>
                        <td><?= htmlspecialchars($donhang['ten_sps']) ?></td>
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
                        <td><?= htmlspecialchars($donhang['ngay_dat']) ?></td>
                        <td>
                            <?php if ($donhang['trangthai'] == 0) : ?>
                                <a href="index.php?act=accept_donhang&id=<?= htmlspecialchars($donhang['id_dh']) ?>" class="confim" onclick="return confirm('Bạn có chắc chắn muốn xác nhận đơn hàng này không?')"><i class="fas fa-check"></i></a>
                                <a href="index.php?act=delete_donhang&id=<?= htmlspecialchars($donhang['id_dh']) ?>" class="confim" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')"><i class="fas fa-trash"></i></a>
                            <?php elseif ($donhang['trangthai'] == 1) : ?>
                                <a href="index.php?act=track_donhang&id=<?= htmlspecialchars($donhang['id_dh']) ?>" class="confim"><i class="fas fa-truck"></i></a>
                            <?php elseif ($donhang['trangthai'] == 2) : ?>
                                <a href="index.php?act=archive_donhang&id=<?= htmlspecialchars($donhang['id_dh']) ?>" class="confim"><i class="fas fa-archive"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
