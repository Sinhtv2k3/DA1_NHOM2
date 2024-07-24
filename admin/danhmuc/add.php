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
            <h2>Thêm Danh Mục</h2>
        </div>
        <div class="bang">
            <form name="myForm" action="index.php?act=adddm" method="post" onsubmit="return validateForm()">
                <div class="maloai">
                    <!-- Tên Loại -->
                    <label for="tenloai">Tên Loại</label>
                    <input type="text" id="tenloai" name="tenloai" class="tenloai" required>
                </div>
                <div class="nut">
                    <!-- Nút Thêm Mới -->
                    <input type="submit" name="themmoi" value="Thêm Mới" class="small-button">

                    <!-- Liên kết đến Danh sách danh mục -->
                    <a href="index.php?act=listdm">
                        <input type="button" value="Danh sách" class="small-button">
                    </a>
                </div>
                <!-- Hiển thị thông báo -->
                <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
            </form>
        </div>
    </div>
</div>