<div class="row box">
    <div class="boxtrai">
        <div class="loai ">
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
                <li><a href="../index.php">Trang chủ</a></li>
            </ul>
        </div>
    </div>
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
                    <input type="text" name="ten_sp" id="ten_sp" >

                </div>
                <div class="maloai">
                    Giá<br>
                    <input type="text" name="gia" id="gia" >
                </div>
                <div class="maloai">
                    Hình<br>
                    <input type="file" name="anh" id="anh" >
                </div>
                <div class="maloai">
                    Số Lượng<br>
                    <input type="number" name="so_luong" id="so_luong" >
                </div>
                <div class="maloai" >
                    Mô Tả<br>
                    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10"></textarea>
                </div>

                <div class="nut">
                    <input type="submit" name="themmoi" value="Thêm Mới">
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