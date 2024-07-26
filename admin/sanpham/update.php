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
    <?php include 'boxtrai.php'; ?>
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
                        <option value="0" <?= $trangthai == 0 ? 'selected' : '' ?>>Đang hoạt động</option>
                        <option value="1" <?= $trangthai == 1 ? 'selected' : '' ?>>Không hoạt động</option>
                    </select>
                </div>
                <div class="maloai">
                    Mô Tả<br>
                    <textarea name="mota" id="mota" cols="30" rows="10"><?= $mo_ta ?></textarea>
                </div>

                <div class="nut">
                    <input type="hidden" name="id" value="<?= $id_sp ?>">
                    <button type="submit" name="capnhat" class="small-button"><i class="fas fa-save"></i> Cập Nhật</button>
                    <a href="index.php?act=listsp" class="small-button"><i class="fas fa-list"></i> Danh sách</a>
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
        var mota = document.getElementById("mota").value.trim();

        if (tensp === "") {
            alert("Vui lòng nhập tên sản phẩm");
            return false;
        }

        if (giasp === "") {
            alert("Vui lòng nhập giá sản phẩm");
            return false;
        }

        if (mota === "") {
            alert("Vui lòng mô tả sản phẩm");
            return false;
        }

        return true;
    }
</script>
