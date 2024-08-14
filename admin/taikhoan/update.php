<div class="row box">
    <?php include 'boxtrai.php'; ?>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>Cập Nhật Tài Khoản</h2>
        </div>
        <div class="bang">
            <form name="myForm" action="index.php?act=updateprocess" method="post">
                <input type="hidden" name="id_tk" value="<?php echo htmlspecialchars($taikhoan['id_tk'], ENT_QUOTES, 'UTF-8'); ?>">

                <div class="maloai">
                    <label for="ten">Tên:</label><br>
                    <input type="text" id="ten" name="ten" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['ten'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="maloai">
                    <label for="sdt">Số Điện Thoại:</label><br>
                    <input type="text" id="sdt" name="sdt" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['sdt'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="maloai">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['email'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="maloai">
                    <label for="dia_chi">Địa Chỉ:</label><br>
                    <input type="text" id="dia_chi" name="dia_chi" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['dia_chi'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="maloai">
                    <label for="trangthai">Trạng Thái:</label><br>
                    <select id="trangthai" name="trangthai">
                        <option value="0" <?php if ($taikhoan['trangthai'] == '0') echo 'selected'; ?>>Hoạt động</option>
                        <option value="1" <?php if ($taikhoan['trangthai'] == '1') echo 'selected'; ?>>Không hoạt động</option>
                    </select>
                </div>

                <div class="nut">
                    <button type="submit" name="capnhat" class="small-button">
                        <i class="fas fa-save"></i> Cập Nhật
                    </button>
                    <a href="index.php?act=listtk" class="small-button">
                        <i class="fas fa-list"></i> Danh Sách
                    </a>
                </div>

                <?php if (isset($thongbao) && $thongbao != ""): ?>
                    <p><?php echo htmlspecialchars($thongbao, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>