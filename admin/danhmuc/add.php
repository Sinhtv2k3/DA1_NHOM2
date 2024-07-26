<!-- index.php hoặc trang cần sử dụng boxtrai -->
<div class="row box">
    <?php include 'boxtrai.php'; ?>
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
                    <button type="submit" name="themmoi" class="small-button">
                        <i class="fas fa-plus"></i> Thêm Mới
                    </button>

                    <!-- Liên kết đến Danh sách danh mục -->
                    <a href="index.php?act=listdm" class="small-button">
                        <i class="fas fa-list"></i> Danh Sách
                    </a>
                </div>
                <!-- Hiển thị thông báo -->
                <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
            </form>
        </div>
    </div>
</div>
