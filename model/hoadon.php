<?php
include_once 'pdo.php';

/**
 * Thêm đơn hàng vào bảng donhang
 */
function insert_donhang($ngay_dat, $ten_nd, $sdt, $email, $dia_chi, $payment_method)
{
    $sql = "INSERT INTO donhang (ngay_dat, ten_nd, sdt, email, dia_chi, trangthai, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_lastInsertId($sql, [$ngay_dat, $ten_nd, $sdt, $email, $dia_chi, 0, $payment_method]);
}

/**
 * Thêm chi tiết đơn hàng vào bảng chitiet_donhang
 */
function insert_chitiet_donhang($id_dh, $id_sp, $ten_sp, $gia, $sl, $tongtien, $id_tk)
{
    $sql = "INSERT INTO chitiet_donhang (id_dh, id_sp, ten_sp, gia, sl, tongtien, id_tk) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, [$id_dh, $id_sp, $ten_sp, $gia, $sl, $tongtien, $id_tk]);
}

/**
 * Tạo đơn hàng mới
 */
function create_order($name, $phone, $email, $address, $payment_method, $id_tk)
{
    $pdo = pdo_get_connection(); // Tạo kết nối PDO

    // Bắt đầu giao dịch
    $pdo->beginTransaction();

    try {
        // Thêm đơn hàng vào bảng donhang
        $order_id = insert_donhang(date('Y-m-d'), $name, $phone, $email, $address, $payment_method);

        // Thêm các sản phẩm vào bảng chi tiết đơn hàng
        foreach ($_SESSION['myCart'] as $product) {
            insert_chitiet_donhang($order_id, $product[0], $product[1], $product[3], $product[4], $product[3] * $product[4], $id_tk);
        }

        // Cam kết giao dịch
        $pdo->commit();

        // Xóa giỏ hàng
        $_SESSION['myCart'] = [];

        return $order_id;
    } catch (Exception $e) {
        // Nếu có lỗi, rollback giao dịch
        $pdo->rollBack();
        throw $e;
    } finally {
        $pdo = null; // Đảm bảo giải phóng kết nối
    }
}

/**
 * Lấy thông tin đơn hàng theo ID
 */
function load_order_by_id($id) {
    global $pdo;
    $sql = "SELECT * FROM donhang WHERE id_dh = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Lấy chi tiết đơn hàng theo ID
 */
function load_order_details_by_id($id) {
    global $pdo;
    $sql = "SELECT * FROM chitiet_donhang WHERE id_dh = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
