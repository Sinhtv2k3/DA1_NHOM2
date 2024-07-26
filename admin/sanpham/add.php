<!-- index.php hoặc trang cần sử dụng boxtrai -->
<div class="row box">
    <?php include 'boxtrai.php'; ?>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>Thêm Sản Phẩm</h2>
        </div>
        <div class="bang">
            <form id="myForm" action="index.php?act=addsp" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="maloai">
                    Danh mục sản phẩm<br>
                    <select name="id_dm" id="id_dm">
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            if ($trangthai == 0) {
                                echo '<option value="' . $id_dm . '">' . $ten_dm . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="maloai">
                    Tên sản phẩm<br>
                    <input type="text" name="ten_sp" id="ten_sp">
                </div>
                <div class="maloai">
                    Giá<br>
                    <input type="text" name="gia" id="gia">
                </div>
                <div class="maloai">
                    Hình<br>
                    <input type="file" name="anh" id="anh">
                </div>
                <div class="maloai">
                    Số Lượng<br>
                    <input type="number" name="so_luong" id="so_luong">
                </div>
                <div class="maloai">
                    Mô Tả<br>
                    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10"></textarea>
                </div>

                <div class="nut">
                    <button type="submit" name="themmoi" class="small-button">
                        <i class="fas fa-plus"></i> Thêm Mới
                    </button>
                    <a href="index.php?act=listsp" class="small-button">
                        <i class="fas fa-list"></i> Danh Sách
                    </a>
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
        var ten_sp = document.getElementById("ten_sp").value.trim();
        var gia = document.getElementById("gia").value.trim();
        var so_luong = document.getElementById("so_luong").value.trim();
        var mo_ta = document.getElementById("mo_ta").value.trim();
        var anh = document.getElementById("anh").value.trim();

        if (ten_sp === "") {
            alert("Vui lòng nhập tên sản phẩm");
            return false;
        }

        if (gia === "") {
            alert("Vui lòng nhập giá sản phẩm");
            return false;
        }

        if (so_luong === "") {
            alert("Vui lòng nhập số lượng sản phẩm");
            return false;
        }

        if (mo_ta === "") {
            alert("Vui lòng mô tả sản phẩm");
            return false;
        }

        if (anh === "") {
            alert("Vui lòng chọn hình ảnh sản phẩm");
            return false;
        }

        return true;
    }
</script>
