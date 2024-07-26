<!-- index.php hoặc trang cần sử dụng boxtrai -->
<div class="row box">
    <?php include 'boxtrai.php'; ?>
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
                    <button type="submit" name="capnhat" class="small-button">
                        <i class="fas fa-save"></i> Cập Nhật
                    </button>
                    <a href="index.php?act=listdm" class="small-button">
                        <i class="fas fa-list"></i> Danh Sách
                    </a>
                </div>
                <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
            </form>
        </div>
    </div>
</div>
