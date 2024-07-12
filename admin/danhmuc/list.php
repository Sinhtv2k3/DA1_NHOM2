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
                <li><a href="../index.php">Quay về Trang Chủ</a></li>
            </ul>
        </div>

    </div>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>List Danh Mục</h2>
        </div>
        <div class="bangl">
    <table>
        <tr>
            <th></th>
            <th>MÃ LOẠI</th>
            <th>TÊN LOẠI</th>
            <th>Tùy Chọn</th>
        </tr>
        <?php foreach ($listdanhmuc as $danhmuc) : ?>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td><?= $danhmuc['id_dm'] ?></td>
                <td><?= $danhmuc['ten_dm'] ?></td>
                <td>
                    <a href="index.php?act=suadm&id=<?= $danhmuc['id_dm'] ?>" class="confim">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" href="index.php?act=xoadm&id_dm=<?= $danhmuc['id_dm'] ?>" class="confim">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

        <div class="nut">
            <a href="index.php?act=adddm"><input type="button" name="themmoi" value="Thêm Mới"></a>
        </div>
    </div>
</div>