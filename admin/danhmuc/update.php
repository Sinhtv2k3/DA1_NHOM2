<?php
if (is_array($dm)) {
    extract($dm);
}
$hinhanhpath = "../upload/" . $img;
if (is_file($hinhanhpath)) {
    $hinh = "<img src='" . $hinhanhpath . "' height='200'>";
} else {
    $hinh = "no photo";
}
?>
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
            <h2>Sửa Danh Mục</h2>
        </div>
        <div class="bang">
            <form id="myForm" action="index.php?act=updatedm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="maloai">
                    Mã Loại<br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="maloai">
                    Hình<br>
                    <input type="file" name="hinh">
                    <?= $hinh ?>
                </div>
                <div class="maloai">
                    Tên Loại<br>
                    <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                </div>
                <div class="nut">
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                    <input type="submit" name="capnhat" value="Cập Nhật">
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
    if (tenloai == "") {
        alert("Vui lòng nhập tên loại");
        return false;
    }
    }
</script>