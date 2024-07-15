
<div class="row box">
    <div class="boxtrai">
        <div class="loai logoam tren">
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
                <li><a href="../index.php">Trang Chủ</a></li>
            </ul>
        </div>
    </div>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>Danh Sách Sản Phẩm</h2>
            <form action="index.php?act=listsp" method="post">
                <input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                <select name="id_dm">
                    <option value="0">Tất cả danh mục</option>
                    <?php foreach ($listdanhmuc as $danhmuc) { ?>
                        <option value="<?php echo $danhmuc['id_dm']; ?>"><?php echo $danhmuc['ten_dm']; ?></option>
                    <?php } ?>
                </select>
                <button type="submit">Tìm kiếm</button>
                <a href="index.php?act=addsp">
                    <input type="button" value=" Thêm mới" class="small-button">
                </a>
            </form>
        </div>
        <div class="bang">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Danh mục</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($listsanpham) && count($listsanpham) > 0) {
                        foreach ($listsanpham as $sanpham) {
                            $trangthai = $sanpham['trangthai'] == '0' ? 'Còn hàng' : 'Hết hàng';
                            ?>
                            <tr>
                                <td><?= $sanpham['id_sp'] ?></td>
                                <td><?= $sanpham['ten_sp'] ?></td>
                                <td><?= $sanpham['gia'] ?></td>
                                <td><img src="../upload/<?= $sanpham['anh'] ?>" width="100"></td>
                                <td><?= $sanpham['mo_ta'] ?></td>
                                <td><?= $sanpham['ten_dm'] ?></td>
                                <td><?= $sanpham['so_luong'] ?></td>
                                <td><?= $trangthai ?></td>
                                <td>
                                    <a href="index.php?act=suasp&id=<?= $sanpham['id_sp'] ?>" class="confim">Sửa</a>
                                    <a href="#" onclick="return confirmDelete(<?= htmlspecialchars($sanpham['id_sp']) ?>)" class="confim">Xóa</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">Không có sản phẩm nào</td>
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
    var result = confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');
    if (result) {
        window.location.href = 'index.php?act=xoasp&id=' + id;
    }
    return false; 
}
</script>
