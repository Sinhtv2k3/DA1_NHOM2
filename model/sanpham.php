<?php


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
function loadall_sanpham($kyw = '', $id_dm = 0)
{
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

    $sql .= " ORDER BY sp.id_sp ASC";
    return pdo_query($sql, $params);
}
//Load sản phẩm ra trang chủ
function loadall_sanpham_home($kyw = '', $iddm = 0)
{
    $sql = "SELECT * FROM sanpham 
            WHERE so_luong > 0 AND trangthai = 0 
            ORDER BY id_sp DESC 
            LIMIT 0, 9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


// Xóa sản phẩm
function delete_sanpham($id)
{
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
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
    return pdo_query_one($sql, array($id));
}

// Cập nhật thông tin sản phẩm
function update_sanpham($id, $id_dm, $tensp, $giasp, $mota, $hinh, $soluong, $trangthai)
{
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
