<div class="row box">
    <?php include 'boxtrai.php'; ?>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>Danh Sách Tài Khoản</h2>
            <form action="index.php?act=listtk" method="post">
                <input type="text" name="kyw" placeholder="Tìm kiếm tài khoản" value="<?= isset($_POST['kyw']) ? htmlspecialchars($_POST['kyw']) : '' ?>">
                <select name="role">
                    <option value="">Chọn loại người dùng</option>
                    <option value="0" <?= isset($_POST['role']) && $_POST['role'] == '0' ? 'selected' : '' ?>>Người dùng</option>
                    <option value="1" <?= isset($_POST['role']) && $_POST['role'] == '1' ? 'selected' : '' ?>>Admin</option>
                </select>
                <button type="submit" class="small-button"><i class="fas fa-search"></i> Tìm kiếm</button>

            </form>
        </div>
        <div class="bang">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Tên người dùng</th>
                        <th>Trạng thái</th>
                        <th>Role</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($listtaikhoan) && count($listtaikhoan) > 0) {
                        foreach ($listtaikhoan as $taikhoan) {
                            $trangthai = $taikhoan['trangthai'] == '0' ? 'Hoạt động' : 'Không hoạt động';
                            $role = $taikhoan['role'] == '0' ? 'Người dùng' : 'Admin';
                    ?>
                            <tr>
                                <td><?= htmlspecialchars($taikhoan['id_tk']) ?></td>
                                <td><?= htmlspecialchars($taikhoan['ten']) ?></td>
                                <td><?= htmlspecialchars($taikhoan['sdt']) ?></td>
                                <td><?= htmlspecialchars($taikhoan['email']) ?></td>
                                <td><?= htmlspecialchars($taikhoan['dia_chi']) ?></td>
                                <td><?= htmlspecialchars($taikhoan['ten_nd']) ?></td>
                                <td><?= htmlspecialchars($trangthai) ?></td>
                                <td><?= htmlspecialchars($role) ?></td>
                                <td>
                                    <a href="index.php?act=update&id_tk=<?= htmlspecialchars($taikhoan['id_tk']) ?>" class="small-button"><i class="fas fa-edit"></i></a>
                                    <a href="#" onclick="return confirmDelete(<?= htmlspecialchars($taikhoan['id_tk']) ?>)" class="small-button"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">Không có tài khoản nào</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        var result = confirm('Bạn có chắc chắn muốn xóa tài khoản này?');
        if (result) {
            window.location.href = 'index.php?act=xoatk&id=' + id;
        }
        return false;
    }
</script>