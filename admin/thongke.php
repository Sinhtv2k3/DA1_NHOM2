<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH THỐNG KÊ</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <thead>
                    <tr>


                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá cao nhất</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Kiểm tra nếu $listtk có dữ liệu
                    if ($listtk) {
                        foreach ($listtk as $item) {
                            extract($item);
                            echo '
                            <tr>
                               
                                <td>' . $tendm . '</td>
                                <td>' . $countsp . '</td>
                                <td>' . $maxprice . '</td>
                                <td>' . $minprice . '</td>
                                <td>' . $avgprice . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">Không có dữ liệu thống kê.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mb10">
            <a href="index.php?act=bieudo"><input type="button" value="Biểu đồ" /></a>
        </div>
    </div>
</div>