<!-- index.php hoặc trang cần sử dụng boxtrai -->
<div class="row box">
    <?php include 'boxtrai.php'; ?>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>DANH SÁCH DANH MỤC</h2>
        </div>
        <div class="bangl">
            <table>
                <tr>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th>TRẠNG THÁI</th>
                    <th>Tùy Chọn</th>
                </tr>
                <?php foreach ($listdanhmuc as $danhmuc) : ?>
                    <tr>
                        <td><?= htmlspecialchars($danhmuc['id_dm']) ?></td>
                        <td><?= htmlspecialchars($danhmuc['ten_dm']) ?></td>
                        <td>
                            <?= $danhmuc['trangthai'] == '0' ? 'Đang hoạt động' : 'Không hoạt động'; ?>
                        </td>
                        <td>
                            <a href="index.php?act=suadm&id=<?= htmlspecialchars($danhmuc['id_dm']) ?>" class="confim"><i class="fas fa-edit"></i></a>
                            <!-- <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=xoadm&id_dm=<?= htmlspecialchars($danhmuc['id_dm']) ?>" class="confim"><i class="fas fa-trash"></i></a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="nut">
            <a href="index.php?act=adddm"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
