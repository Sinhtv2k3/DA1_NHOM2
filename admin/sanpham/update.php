<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhanhpath = "../upload/" . $anh;
if (is_file($hinhanhpath)) {
    $hinh = "<img src='" . $hinhanhpath . "' height='200'>";
} else {
    $hinh = "Không có ảnh";
}
?>
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
            <h2>Sửa Sản Phẩm</h2>
        </div>
        <div class="bang">
            <form id="myForm" action="?act=updatesp" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

                <div class="maloai">
                    <label for="iddm">Danh Mục:</label>
                    <select name="iddm" id="iddm">
                        <?php foreach ($listdanhmuc as $danhmuc) : ?>
                            <?php if ($danhmuc['trangthai'] == 0) : ?>
                                <option value="<?= $danhmuc['id_dm'] ?>" <?= $id_dm == $danhmuc['id_dm'] ? "selected" : "" ?>><?= $danhmuc['ten_dm'] ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </div>


                <div class="maloai">
                    Tên sản phẩm<br>
                    <input type="text" name="tensp" value="<?= $ten_sp ?>">
                </div>
                <div class="maloai">
                    Giá<br>
                    <input type="text" name="giasp" value="<?= $gia ?>">
                </div>
                <div class="maloai">
                    Hình<br>
                    <input type="file" name="hinh">
                    <?= $hinh ?>
                </div>
                <div class="maloai">
                    Số lượng<br>
                    <input type="text" name="soluong" value="<?= $so_luong ?>">
                </div>
                <div class="maloai">
                    Trạng thái<br>
                    <select name="trangthai" id="trangthai">
                        <option value="0" <?= $trangthai == 0 ? 'selected' : '' ?>>Còn hàng</option>
                        <option value="1" <?= $trangthai == 1 ? 'selected' : '' ?>>Hết hàng</option>
                    </select>
                </div>
                <div class="maloai">
                    Mô Tả<br>
                    <textarea name="mota" id="mota" cols="30" rows="10"><?= $mo_ta ?></textarea>
                </div>

                <div class="nut">
                    <input type="hidden" name="id" value="<?= $id_sp ?>">
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
        var tensp = document.getElementsByName("tensp")[0].value.trim();
        var giasp = document.getElementsByName("giasp")[0].value.trim();
        var mote = document.getElementById("mote").value.trim();

        if (tensp === "") {
            alert("Vui lòng nhập tên sản phẩm");
            return false;
        }

        if (giasp === "") {
            alert("Vui lòng nhập giá sản phẩm");
            return false;
        }

        if (mote === "") {
            alert("Vui lòng mô tả sản phẩm");
            return false;
        }

        return true;
    }
</script>