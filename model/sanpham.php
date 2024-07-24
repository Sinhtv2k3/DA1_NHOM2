<?php
// function insert_sanpham($tenloai, $giasp, $hinh, $mota, $iddm, $giamgia)
// {
//     $sql = "insert into sanpham(name,price,img,mota,iddm,giam_gia) values('$tenloai', '$giasp', '$hinh',  '$mota', '$iddm', '$giamgia' )";
//     pdo_execute($sql);
// }
// function delete_sanpham($id)
// {
//     $sql = "delete from sanpham where id=" . $id;
//     pdo_execute($sql);
// }
// function loadall_sanpham_top5()
// {
//     $sql = "select * from sanpham where 1 order by luotxem desc limit 0,6";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function loadall_sanpham_home(){
//     $sql = "select * from sanpham where 1 order by id desc limit 0,9";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function loadall_sanpham($kyw = "", $iddm = 0)
// {
//     $sql = "select * from sanpham where 1 ";
//     if ($kyw != "") {/* dùng câu lệnh nối sql và để thực hiện điều kiện lọc trong list danh sách của   */
//         $sql .= " and name like '%" . $kyw . "%'";
//     }
//     if ($iddm > 0) {
//         $sql .= " and iddm = '" . $iddm . "'";
//     }
//     $sql .= " order by id desc";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function load_ten_dm($iddm)
// {
//     if ($iddm > 0) {
//         $sql = "select * from danhmuc where id=" . $iddm;
//         $dm = pdo_query_one($sql);
//         extract($dm);
//         return $name;
//     } else {
//         return "";
//     }
// }
// function loadone_sanpham($id){
//     $sql = "select * from sanpham where id=". $id;
//     $sp = pdo_query_one($sql);
//     return $sp;
// }
// function load_sanpham_cungloai($id, $iddm)
// {
//     $sql = "select * from sanpham where iddm=" . $iddm . " AND id <>" . $id;
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $giamgia)
// {
//     if ($hinh != ""){
//         $sql = "update `sanpham` set `name`='$tensp',`price`='$giasp',`img`='$hinh',`mota`='$mota',`iddm`='$iddm',`giam_gia`='$giamgia' where id = '$id'";
//     }
//     else{
//         $sql = "update `sanpham` set `name`='$tensp',`price`='$giasp',`mota`='$mota',`iddm`='$iddm',`giam_gia`='$giamgia' where id = '$id'";
//     }

//     pdo_execute($sql);
// }
// function top10_sanpham(){
//     $sql = "select * from `sanpham` ORDER by luotxem limit 4";
//     $result = pdo_query($sql);
//     return $result;
// }
// function danhsach_sanpham(){
//     $sql = "select * from sanpham";
//     $result = pdo_query($sql);
//     return $result;
// }

// function loadsp_theodanhmuc($id)
// {
//     $sql = "select * from sanpham where iddm=" . $id;
//     $dm = pdo_query($sql);
//     return $dm;
// }
// function insert_sanpham($ten_sp, $gia, $anh, $mo_ta, $trangthai, $id_dm) {
//     // Sửa tên cột và câu lệnh SQL
//     $sql = "INSERT INTO sanpham (ten_sp, gia, anh, mo_ta, trangthai, id_dm) VALUES (?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, $ten_sp, $gia, $anh, $mo_ta, $trangthai, $id_dm);
// }

// function delete_sanpham($id)
// {
//     $sql = "delete from sanpham where id=" . $id;
//     pdo_execute($sql);
// }
// function loadall_sanpham_top5()
// {
//     $sql = "select * from sanpham where 1 order by luotxem desc limit 0,6";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function loadall_sanpham_home(){
//     $sql = "select * from sanpham where 1 order by id desc limit 0,9";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function loadall_sanpham($kyw = "", $iddm = 0)
// {
//     $sql = "select * from sanpham where 1 ";
//     if ($kyw != "") {/* dùng câu lệnh nối sql và để thực hiện điều kiện lọc trong list danh sách của   */
//         $sql .= " and name like '%" . $kyw . "%'";
//     }
//     if ($iddm > 0) {
//         $sql .= " and iddm = '" . $iddm . "'";
//     }
//     $sql .= " order by id desc";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function load_ten_dm($iddm)
// {
//     if ($iddm > 0) {
//         $sql = "select * from danhmuc where id=" . $iddm;
//         $dm = pdo_query_one($sql);
//         extract($dm);
//         return $name;
//     } else {
//         return "";
//     }
// }
// function loadone_sanpham($id){
//     $sql = "select * from sanpham where id=". $id;
//     $sp = pdo_query_one($sql);
//     return $sp;
// }
// function load_sanpham_cungloai($id, $iddm)
// {
//     $sql = "select * from sanpham where iddm=" . $iddm . " AND id <>" . $id;
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $giamgia)
// {
//     if ($hinh != ""){
//         $sql = "update `sanpham` set `name`='$tensp',`price`='$giasp',`img`='$hinh',`mota`='$mota',`iddm`='$iddm',`giam_gia`='$giamgia' where id = '$id'";
//     }
//     else{
//         $sql = "update `sanpham` set `name`='$tensp',`price`='$giasp',`mota`='$mota',`iddm`='$iddm',`giam_gia`='$giamgia' where id = '$id'";
//     }

//     pdo_execute($sql);
// }
// function top10_sanpham(){
//     $sql = "select * from `sanpham` ORDER by luotxem limit 4";
//     $result = pdo_query($sql);
//     return $result;
// }
// function danhsach_sanpham(){
//     $sql = "select * from sanpham";
//     $result = pdo_query($sql);
//     return $result;
// }

// function loadsp_theodanhmuc($id)
// {
//     $sql = "select * from sanpham where iddm=" . $id;
//     $dm = pdo_query($sql);
//     return $dm;
// }

// function insert_sanpham($ten_sp, $gia, $anh, $mo_ta, $trangthai, $id_dm) {
//     $sql = "INSERT INTO sanpham (ten_sp, gia, anh, mo_ta, trangthai, id_dm) VALUES (?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, $ten_sp, $gia, $anh, $mo_ta, $trangthai, $id_dm);
// }

// function delete_sanpham($id) {
//     $sql = "DELETE FROM sanpham WHERE id_sp = ?";
//     pdo_execute($sql, [$id]);
// }

// function loadall_sanpham_top5() {
//     $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 5";
//     return pdo_query($sql);
// }

// function loadall_sanpham_home() {
//     $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 9";
//     return pdo_query($sql);
// }

// function loadall_sanpham($kyw = "", $id_dm = 0) {
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if ($kyw != "") {
//         $sql .= " AND ten_sp LIKE ?";
//     }
//     if ($id_dm > 0) {
//         $sql .= " AND id_dm = ?";
//     }
//     $sql .= " ORDER BY id_sp DESC";
//     return pdo_query($sql, [$kyw ? "%$kyw%" : null, $id_dm > 0 ? $id_dm : null]);
// }

// function load_ten_dm($id_dm) {
//     if ($id_dm > 0) {
//         $sql = "SELECT ten_dm FROM danhmuc WHERE id_dm = ?";
//         $dm = pdo_query_one($sql, [$id_dm]);
//         return $dm['ten_dm'];
//     }
//     return "";
// }

// function loadone_sanpham($id) {
//     $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
//     return pdo_query_one($sql, [$id]);
// }

// function load_sanpham_cungloai($id, $iddm) {
//     $sql = "SELECT * FROM sanpham WHERE id_dm = ? AND id_sp <> ?";
//     return pdo_query($sql, [$iddm, $id]);
// }

// function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $giamgia) {
//     if ($hinh) {
//         $sql = "UPDATE sanpham SET ten_sp = ?, gia = ?, anh = ?, mo_ta = ?, id_dm = ?, giamgia = ? WHERE id_sp = ?";
//         pdo_execute($sql, $tensp, $giasp, $hinh, $mota, $iddm, $giamgia, $id);
//     } else {
//         $sql = "UPDATE sanpham SET ten_sp = ?, gia = ?, mo_ta = ?, id_dm = ?, giamgia = ? WHERE id_sp = ?";
//         pdo_execute($sql, $tensp, $giasp, $mota, $iddm, $giamgia, $id);
//     }
// }

// function top10_sanpham() {
//     $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 10";
//     return pdo_query($sql);
// }

// function danhsach_sanpham() {
//     $sql = "SELECT * FROM sanpham";
//     return pdo_query($sql);
// }

// function loadsp_theodanhmuc($id) {
//     $sql = "SELECT * FROM sanpham WHERE id_dm = ?";
//     return pdo_query($sql, [$id]);
// }
// 
// Thêm sản phẩm
// function insert_sanpham($tensp, $giasp, $hinh, $mota, $id_dm, $trangthai) {
//     $sql = "INSERT INTO sanpham (ten_sp, gia, anh, mo_ta, id_dm, trangthai) VALUES (?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, $tensp, $giasp, $hinh, $mota, $id_dm, $trangthai);
// }
// function insert_sanpham($tensp, $giasp, $hinh, $mota, $id_dm, $trangthai) {
//     $sql = "INSERT INTO sanpham (ten_sp, gia, anh, mo_ta, id_dm, trangthai) VALUES (?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, $tensp, $giasp, $hinh, $mota, $id_dm, $trangthai);
// }


// Lấy tất cả sản phẩm

// Thêm sản phẩm mới
function insert_sanpham($ten_sp, $gia, $anh, $so_luong, $mo_ta, $id_dm, $trangthai = 0)
{
    $sql = "INSERT INTO sanpham (ten_sp, gia, anh, so_luong, mo_ta, id_dm, trangthai) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sql_args = array($ten_sp, $gia, $anh, $so_luong, $mo_ta, $id_dm, $trangthai);
    pdo_execute($sql, $sql_args);
}


// Tải danh sách sản phẩm
function loadall_sanpham($kyw = '', $id_dm = 0) {
    $sql = "SELECT sp.*, dm.ten_dm 
            FROM sanpham sp 
            LEFT JOIN danhmuc dm ON sp.id_dm = dm.id_dm 
            WHERE 1";

    $params = array();
    
    if ($kyw != '') {
        $sql .= " AND sp.ten_sp LIKE ?";
        $params[] = "%$kyw%";
    }
    if ($id_dm > 0) {
        $sql .= " AND sp.id_dm = ?";
        $params[] = $id_dm;
    }

    $sql .= " AND dm.trangthai = 0";
    
    $sql .= " ORDER BY sp.id_sp DESC"; 
    return pdo_query($sql, $params);
}
//Load sản phẩm ra trang chủ
function loadall_sanpham_home($kyw = '', $iddm = 0)
{
    $sql = "SELECT * FROM sanpham WHERE 1 order by id_sp desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Xóa sản phẩm
function delete_sanpham($id) {
    $sql = "DELETE FROM sanpham WHERE id_sp = ?";
    pdo_execute($sql, array($id));
}

// Tải tên danh mục
function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT * FROM danhmuc WHERE id_dm = ? AND trangthai = 0";
        $dm = pdo_query_one($sql, array($iddm));
        return $dm ? $dm['ten_dm'] : "";
    } else {
        return "";
    }
}


// Lấy thông tin chi tiết sản phẩm
function loadone_sanpham($id){
    $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
    return pdo_query_one($sql, array($id));
}

// Cập nhật thông tin sản phẩm
function update_sanpham($id, $id_dm, $tensp, $giasp, $mota, $hinh, $soluong, $trangthai) {
    $sql = "UPDATE sanpham SET id_dm = ?, ten_sp = ?, gia = ?, mo_ta = ?, anh = ?, so_luong = ?, trangthai = ? WHERE id_sp = ?";
    pdo_execute($sql, array($id_dm, $tensp, $giasp, $mota, $hinh, $soluong, $trangthai, $id));
}

function loadall_sanpham_top5()
{
    $sql = "select * from sanpham where 1 order by lx desc limit 0,5";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

// // Lấy sản phẩm theo ID
// function loadone_sanpham($id) {
//     $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
//     return pdo_query_one($sql, $id);
// }
