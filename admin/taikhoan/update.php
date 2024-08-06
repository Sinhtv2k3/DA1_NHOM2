<div class="row box">
        <?php include 'boxtrai.php'; ?>
        <div class="boxphai">
            <div class="tieudeb">
                <h2>Cập Nhật Tài Khoản</h2>
            </div>
            <div class="bang">
                <form name="myForm" action="index.php?act=updateprocess" method="post">
                    <div class="maloai">
                        <input type="hidden" name="id_tk" value="<?php echo htmlspecialchars($taikhoan['id_tk']); ?>">
                        ID Tài Khoản: <?php echo htmlspecialchars($taikhoan['id_tk']); ?>
                    </div>
                    <div class="maloai">
                        Tên<br>
                        <input type="text" name="ten" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['ten']); ?>">
                    </div>
                    <div class="maloai">
                        Số Điện Thoại<br>
                        <input type="text" name="sdt" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['sdt']); ?>">
                    </div>
                    <div class="maloai">
                        Email<br>
                        <input type="email" name="email" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['email']); ?>">
                    </div>
                    <div class="maloai">
                        Địa Chỉ<br>
                        <input type="text" name="dia_chi" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['dia_chi']); ?>">
                    </div>
                    <div class="maloai">
                        Tên Người Dùng<br>
                        <input type="text" name="ten_nd" class="tenloai" value="<?php echo htmlspecialchars($taikhoan['ten_nd']); ?>">
                    </div>
                    <div class="maloai">
                        Trạng Thái<br>
                        <select name="trangthai">
                            <option value="0" <?php if ($taikhoan['trangthai'] == '0') echo 'selected'; ?>>Hoạt động</option>
                            <option value="1" <?php if ($taikhoan['trangthai'] == '1') echo 'selected'; ?>>Không hoạt động</option>
                        </select>
                    </div>
                    <!-- <div class="maloai">
                        Vai Trò<br>
                        <select name="role">
                            <option value="0" <?php if ($taikhoan['role'] == '0') echo 'selected'; ?>>Người dùng</option>
                            <option value="1" <?php if ($taikhoan['role'] == '1') echo 'selected'; ?>>Admin</option>
                        </select>
                    </div> -->
                    <div class="nut">
                        <button type="submit" name="capnhat" class="small-button">
                            <i class="fas fa-save"></i> Cập Nhật
                        </button>
                        <a href="index.php?act=listtk" class="small-button">
                            <i class="fas fa-list"></i> Danh Sách
                        </a>
                    </div>
                    <?php if (isset($thongbao) && $thongbao != "") echo '<p>' . htmlspecialchars($thongbao) . '</p>'; ?>
                </form>
            </div>
        </div>
    </div>