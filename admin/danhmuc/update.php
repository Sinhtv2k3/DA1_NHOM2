<div class="row box">
    <div class="boxtrai">
        <div class="loai logoam tren">
            <img src="../upload/images (1).png" width="100%" height="100%" alt="">
        </div>
        <div class="loai hieuung">
            <ul>

            <li><a href="?act=listdm">Danh Mục</a></li>
                <li><a href="?act=addsp">Sản Phẩm</a></li>
                <li><a href="?act=taikhoan">Tài Khoản</a></li>
                <li><a href="?act=dsbl">Bình Luận</a></li>
                <li><a href="?act=listdh">Đơn Hàng</a></li>
                <li><a href="index.php?act=thongke">Thống Kê</a></li>
                <li><a href="../index.php">Trang chủ</a></li>

            </ul>
        </div>
    </div>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>Cập Nhật Danh Mục</h2>
        </div>
        <div class="bang">
            <form name="myForm" action="index.php?act=suadm" method="post">
                <div class="maloai">
                    <input type="hidden" name="id_dm" value="<?php echo $danhmuc['id_dm']; ?>">
                    Mã Loại: <?php echo $danhmuc['id_dm']; ?>
                </div>
                <div class="maloai">
                    Tên Loại<br>
                    <input type="text" name="tenloai" class="tenloai" value="<?php echo $danhmuc['ten_dm']; ?>">
                </div>
                <div class="maloai">
                    Trạng Thái<br>
                    <select name="trangthai">
                        <option value="0" <?php if ($danhmuc['trangthai'] == '0') echo 'selected'; ?>>Đang hoạt động</option>
                        <option value="1" <?php if ($danhmuc['trangthai'] == '1') echo 'selected'; ?>>Không hoạt động</option>
                    </select>
                </div>
                <div class="nut">
                    <input type="submit" name="capnhat" value="Cập Nhật">
                    <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                </div>
                <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
            </form>
        </div>
    </div>
</div>