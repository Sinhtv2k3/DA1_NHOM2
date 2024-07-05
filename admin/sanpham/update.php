<?php
if (is_array($sanpham)) {
    extract($sanpham);
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
            <h2>Sửa Sản Phẩm</h2>
        </div>
        <div class="bang">
            <form id="myForm" action="?act=updatesp" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

                <div class="maloai">
                    <!-- <select class="dmsuasp" name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            if ($iddm == $id) $s = "selected";/*nếu iddm(là id vừa extract ra bằng với id trong bảng thì mới cho selected) */
                            else $s = "";
                            echo '<option value="' . $id . '"' . $s . '>' . $name . '</option>';
                        }
                        ?>
                    </select> -->
                    <!--phan tren loi len dung cach duoi vi name sp no lay cua thg danh muc  -->
                    <label for="danhmuc">Danh Mục:</label>
                    <select name="iddm">
                        <?php foreach ($listdanhmuc as $danhmuc) : ?>
                            <option value="<?= $danhmuc['id'] ?>" <?= $sanpham['iddm'] == $danhmuc['id'] ? "selected" : "" ?>><?= $danhmuc['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="maloai">
                    Tên sản phẩm<br>
                    <input type="text" name="tensp" value="<?= $sanpham['name'] ?>">
                </div>
                <div class="maloai">
                    Giá<br>
                    <input type="text" name="giasp" value="<?= $price ?>">
                </div>
                <div class="maloai">
                    Hình<br>
                    <input type="file" name="hinh">
                    <?= $hinh ?>
                </div>
                <div class="maloai">
                    Mô Tả<br>
                    <textarea name="mote" id="" cols="30" rows="10"><?= $mota ?></textarea>
                </div>

                <div class="maloai">
                    Giảm Giá<br>
                    <input type="input" name="giamgia" value="<?php echo $sanpham['giam_gia'] ?>">
                </div>

                <!-- hidden dùng để cập nhật hết lại thông tin vô lại bảng  -->
                <div class="nut">
                    <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
                    <input type="submit" name="capnhat" value="Cập Nhật">
                    <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
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
        var tensp = document.getElementsByName("tensp")[0].value;
        var giasp = document.getElementsByName("giasp")[0].value;
        var mote = document.getElementsByName("mote")[0].value;

        if (tensp == "") {
            alert("Vui lòng nhập tên sản phẩm");
            return false;
        }

        if (giasp == "") {
            alert("Vui lòng nhập giá sản phẩm");
            return false;
        }

        if (mote == "") {
            alert("Vui lòng mô tả sản phẩm");
            return false;
        }
    }
</script>