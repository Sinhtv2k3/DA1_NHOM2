<!-- index.php hoặc trang cần sử dụng boxtrai -->
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
                    <th>Mã Hóa Đơn</th>
                    <th>Khách Hàng</th>
                    <th>Số Lượng</th>
                    <th>Giá Trị</th>
                    <th>Tình Trạng</th>
                    <th>Ngày Đặt</th>
                    <th>Thao Tác</th>
                </tr>
                <?php foreach ($listdonhang as $donhang) : ?>
                    <tr>
                        <td><?= htmlspecialchars($donhang['id_ct_hd']) ?></td>
                        <td><?= htmlspecialchars($donhang['id_hd']) ?></td>
                        <td>
                            <?= htmlspecialchars($donhang['ten_nd']) ?><br>
                            <?= htmlspecialchars($donhang['sdt']) ?><br>
                            <?= htmlspecialchars($donhang['dia_chi']) ?><br>
                            <?= htmlspecialchars($donhang['email']) ?>
                        </td>
                        <td><?= htmlspecialchars($donhang['sl']) ?></td>
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
                                default:
                                    echo 'Không xác định';
                                    break;
                            }
                            ?>
                        </td>
                        <td><?= htmlspecialchars($donhang['ngay_dat']) ?></td>
                        <td>
                            <?php if ($donhang['trangthai'] == 0) : ?>
                                <a href="index.php?act=accept_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim"><i class="fas fa-check"></i></a>
                                <a href="index.php?act=edit_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn hủy không ?')" href="index.php?act=cancel_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim"><i class="fas fa-times"></i></a>
                            <?php elseif ($donhang['trangthai'] == 1) : ?>
                                <a href="index.php?act=track_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim"><i class="fas fa-truck"></i></a>
                                <a href="index.php?act=edit_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim"><i class="fas fa-edit"></i></a>
                            <?php elseif ($donhang['trangthai'] == 2) : ?>
                                <a href="index.php?act=archive_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim"><i class="fas fa-archive"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
