<div class="row box">
    <div class="boxtrai">
        <div class="loai logoam tren">
            <img src="../upload/images (1).png" width="100%" height="100%" alt="">
        </div>
        <div class="loai hieuung">
            <ul>
                <li><a href="?act=adddm">Danh Mục</a></li>
                <li><a href="?act=addsp">Sản Phẩm</a></li>
                <li><a href="?act=taikhoan">Tài Khoản</a></li>
                <li><a href="?act=dsbl">Bình Luận</a></li>
                <li><a href="?act=donhang">Đơn Hàng</a></li>
                <li><a href="index.php?act=thongke">Thống Kê</a></li>
                <li><a href="../index.php">Trang Chủ</a></li>
            </ul>
        </div>
    </div>
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
                                <a href="index.php?act=accept_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim">Chấp Nhận</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn hủy không ?')" href="index.php?act=cancel_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim">Hủy</a>
                            <?php elseif ($donhang['trangthai'] == 1) : ?>
                                <a href="index.php?act=edit_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim">Sửa</a>
                                <a href="index.php?act=track_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim">Theo Dõi</a>
                            <?php elseif ($donhang['trangthai'] == 2) : ?>
                                <a href="index.php?act=archive_donhang&id=<?= htmlspecialchars($donhang['id_hd']) ?>" class="confim">Lưu Trữ</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>