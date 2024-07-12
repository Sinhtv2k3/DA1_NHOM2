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
            <h2>Thêm Danh Mục</h2>
        </div>
        <div class="bang">
            <form name="myForm" action="index.php?act=adddm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="maloai">
                    Mã Loại<br>
                    <input type="text" name="maloai" placeholder="Tự động tăng" disabled>
                </div>
                <!-- <div class="maloai">
                    Hình<br>
                    <input type="file" name="hinh">
                </div> -->
                <div class="maloai">
                    Tên Loại<br>
                    <input type="text" name="tenloai">
                </div>
                <div class="nut">
                    <input type="submit" name="themmoi" value="Thêm Mới">
                    <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>
        </div>
    </div>
</div>
<script>
function validateForm() {
    var tenloai = document.forms["myForm"]["tenloai"].value;
    var hinh = document.forms["myForm"]["hinh"].value;
    if (tenloai == "") {
        alert("Vui lòng nhập tên loại");
        return false;
    }
    if (hinh == "") {
        alert("Vui lòng thêm ảnh loại hàng");
        return false;
    }
}
</script>