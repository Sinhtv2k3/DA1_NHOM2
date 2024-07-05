<div class="row box">
    <div class="boxtrai">
        <div class="loai logoam tren">
            <img src="../image/logovip.jpg" width="150px" height="150px" alt="">
        </div>
        <div class="loai hieuung">
        <ul>
                <li><a href="?act=adddm">Danh Mục</a></li>
                <li><a href="?act=addsp">Sản Phẩm</a></li>
                <li><a href="?act=taikhoan">Tài Khoản</a></li>
                <li><a href="?act=dsbl">Bình Luận</a></li>
                <li><a href="?act=donhang">Đơn Hàng</a></li>
                <li><a href="index.php?act=thongke">Thống Kê</a></li>
                <li><a href="../index.php">Quay về Trang Chủ</a></li>
            </ul>
        </div>
        <form class="odm" action="index.php?act=listsp" method= "post">
                    <input class="tima" type="text" name="kyw" placeholder="Tìm kiếm.....">
                    <select class="odmm" name="iddm">
                        <option value="0" selected>Tất cả</option>
                <?php 
                  foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                  }
                ?>
              </select>
              <input type="submit" name="listok" value="GO">
                </form>

    </div>
    <div class="boxphai">
        <div class="tieudeb">
            <h2>List Danh Mục</h2>
        </div>
        
        <div class="bangl">
            <table>
                <tr>
                    
                    <th>MÃ SP</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Hình</th>
                    <!-- <th>View</th> -->
                    <th>ID SP</th>
                    <th>Tùy Chọn</th> 
                </tr>
                <?php foreach ($listsanpham as $sanpham) : ?>
                    <tr>
                        <td><?= $sanpham['id'] ?></td>
                        <td><?= $sanpham['name'] ?></td>
                        <td>$ <?= $sanpham['price'] ?></td>
                        <td>
                            <img style="width: 85px; height:100px;" src="<?= '../upload/'.$sanpham['img'] ?>" alt="">
                        </td>
                        <!-- <td><?= $sanpham['luotxem'] ?></td> -->
                        <td><?= $sanpham['iddm'] ?></td>
                        <td><a href="index.php?act=updatesp&id=<?=$sanpham['id']?>" class="confim">Sửa</a>
                        <a onclick="return confirm('bạn có chắc xóa không ?')" href="index.php?act=xoasp&id=<?=$sanpham['id']?>" class="confim">Xóa</a> </td>
                    </tr>
                <?php endforeach; ?>

            </table>

            
        </div>
        <div class="nut">
                <a href="index.php?act=addsp"><input type="button" name="themmoi" value="Thêm Mới"></a>    
            </div>

    </div>

</div>