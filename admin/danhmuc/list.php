<div class="row box">
    <div class="boxtrai">
        <div class="loai logoam tren">
            <img src="../image/logovip.jpg" width="150px" height="150px" alt="">
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
                    <th>Hình</th>
                    <th>TÊN LOẠI</th>
                    <th>Tùy Chọn</th>
                </tr>
                <!-- -----------cách 1------------- -->
                <!-- <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            $suadm = "index.php?act=suadm&id=" . $id;
                            $xoadm = "index.php?act=xoadm&id=" . $id;
                            echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td><a href="' . $suadm . '"><input type="button" value="Sửa"></a> <a href="' . $xoadm . '"><input type="button" value="Xóa"></a></td>
                        </tr>';
                        }
                        ?> -->
                <!-- -----------cách 2------------- -->
                <?php foreach ($listdanhmuc as $danhmuc) : ?>
                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><?= $danhmuc['id'] ?></td>
                        <td><img style="width: 85px; height:100px;" src="<?= '../upload/' . $danhmuc['img'] ?>" alt=""></td>
                        <td><?= $danhmuc['name'] ?></td>
                        <td>
                            <a href="index.php?act=suadm&id=<?= $danhmuc['id'] ?>" class="confim">Sửa</a>
                            <a onclick="return confirm('bạn có chắc xóa không ?')" href="index.php?act=xoadm&id=<?= $danhmuc['id'] ?>" class="confim">Xóa</a>
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