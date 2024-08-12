<?php
include_once 'pdo.php'; 

function loadall_donhang() {
    $sql = "SELECT dh.id_dh, dh.ngay_dat, dh.ten_nd, dh.sdt, dh.email, dh.dia_chi, dh.trangthai, 
            SUM(ctd.tongtien) as tong_tien, COUNT(ctd.id_sp) as so_luong, GROUP_CONCAT(sp.ten_sp) as ten_sps
            FROM donhang dh
            LEFT JOIN chitiet_donhang ctd ON dh.id_dh = ctd.id_dh
            LEFT JOIN sanpham sp ON ctd.id_sp = sp.id_sp
            GROUP BY dh.id_dh, dh.ngay_dat, dh.ten_nd, dh.sdt, dh.email, dh.dia_chi, dh.trangthai
            ORDER BY dh.ngay_dat DESC"; 
    return pdo_query($sql) ?: []; 
}

function update_donhang($id_dh, $trangthai) {
    $sql = "UPDATE donhang SET trangthai = ? WHERE id_dh = ?";
    pdo_execute($sql, array($trangthai, $id_dh));
}

function delete_chitiet_donhang($id_dh) {
    $sql = "DELETE FROM chitiet_donhang WHERE id_dh = ?";
    pdo_execute($sql, array($id_dh));
}

function delete_donhang($id_dh) {
    try {
        delete_chitiet_donhang($id_dh);
        $sql = "DELETE FROM donhang WHERE id_dh = ? AND trangthai IN (0, 3)";
        pdo_execute($sql, array($id_dh));
    } catch (PDOException $e) {
        echo "Lỗi khi xóa đơn hàng: " . $e->getMessage();
    }
}

function load_donhang_user($id_tk) {
    $sql = "SELECT dh.id_dh, dh.ngay_dat, dh.trangthai, 
            SUM(ctd.tongtien) as tong_tien, COUNT(ctd.id_sp) as so_luong
            FROM donhang dh
            LEFT JOIN chitiet_donhang ctd ON dh.id_dh = ctd.id_dh
            WHERE ctd.id_tk = ?
            GROUP BY dh.id_dh, dh.ngay_dat, dh.trangthai";
    
    return pdo_query($sql, [$id_tk]) ?: [];
}
?>
