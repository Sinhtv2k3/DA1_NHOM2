<?php
function loadall_donhang() {
    $sql = "SELECT dh.id_dh, dh.ngay_dat, dh.ten_nd, dh.sdt, dh.email, dh.dia_chi, dh.trangthai, 
            SUM(ctd.tongtien) as tong_tien, COUNT(ctd.id_sp) as so_luong, GROUP_CONCAT(sp.ten_sp) as ten_sps
            FROM donhang dh
            LEFT JOIN chitiet_donhang ctd ON dh.id_dh = ctd.id_dh
            LEFT JOIN sanpham sp ON ctd.id_sp = sp.id_sp
            GROUP BY dh.id_dh, dh.ngay_dat, dh.ten_nd, dh.sdt, dh.email, dh.dia_chi, dh.trangthai";
    return pdo_query($sql);
}

// Hàm cập nhật trạng thái đơn hàng
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
        // Xóa các chi tiết đơn hàng trước
        delete_chitiet_donhang($id_dh);

        // Xóa đơn hàng chính
        $sql = "DELETE FROM donhang WHERE id_dh = ? AND trangthai IN (0, 3)";
        pdo_execute($sql, array($id_dh));
    } catch (PDOException $e) {
        // Hiển thị thông báo lỗi
        echo "Lỗi khi xóa đơn hàng: " . $e->getMessage();
    }
}
?>