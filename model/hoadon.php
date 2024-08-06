<?php
include_once 'pdo.php';

/**
 * Thêm đơn hàng vào bảng donhang
 * @param string $ngay_dat Ngày đặt
 * @param string $ten_nd Tên người đặt
 * @param string $sdt Số điện thoại
 * @param string $email Email
 * @param string $dia_chi Địa chỉ
 * @param string $payment_method Phương thức thanh toán
 * @return int ID của đơn hàng vừa được thêm vào
 */
function insert_donhang($ngay_dat, $ten_nd, $sdt, $email, $dia_chi, $payment_method) {
    $sql = "INSERT INTO donhang (ngay_dat, ten_nd, sdt, email, dia_chi, trangthai, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_lastInsertId($sql, [$ngay_dat, $ten_nd, $sdt, $email, $dia_chi, 0, $payment_method]);
}

/**
 * Thêm chi tiết đơn hàng vào bảng chitiet_donhang
 * @param int $id_dh ID đơn hàng
 * @param int $id_sp ID sản phẩm
 * @param string $ten_sp Tên sản phẩm
 * @param float $gia Giá sản phẩm
 * @param int $sl Số lượng
 * @param float $tongtien Tổng tiền
 */
function insert_chitiet_donhang($id_dh, $id_sp, $ten_sp, $gia, $sl, $tongtien) {
    $sql = "INSERT INTO chitiet_donhang (id_dh, id_sp, ten_sp, gia, sl, tongtien) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, [$id_dh, $id_sp, $ten_sp, $gia, $sl, $tongtien]);
}

/**
 * Tạo đơn hàng mới
 * @param string $name Tên người đặt
 * @param string $phone Số điện thoại
 * @param string $email Email
 * @param string $address Địa chỉ
 * @param string $payment_method Phương thức thanh toán
 * @return int ID của đơn hàng vừa được tạo
 */
function create_order($name, $phone, $email, $address, $payment_method) {
    $pdo = pdo_get_connection(); // Tạo kết nối PDO
    
    // Bắt đầu giao dịch
    $pdo->beginTransaction();
    
    try {
        // Thêm đơn hàng vào bảng donhang
        $order_id = insert_donhang(date('Y-m-d'), $name, $phone, $email, $address, $payment_method);
        
        // Thêm các sản phẩm vào bảng chi tiết đơn hàng
        foreach ($_SESSION['myCart'] as $product) {
            insert_chitiet_donhang($order_id, $product[0], $product[1], $product[3], $product[4], $product[3] * $product[4]);
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
 * @param int $id_dh ID đơn hàng
 * @return array mảng chứa thông tin đơn hàng
 */
function load_donhang($id_dh) {
    $sql = "SELECT * FROM donhang WHERE id_dh = ?";
    return pdo_query_one($sql, [$id_dh]);
}

/**
 * Lấy chi tiết đơn hàng theo ID đơn hàng
 * @param int $id_dh ID đơn hàng
 * @return array mảng chứa chi tiết đơn hàng
 */
function load_chitiet_donhang($id_dh) {
    $sql = "SELECT * FROM chitiet_donhang WHERE id_dh = ?";
    return pdo_query($sql, [$id_dh]);
}

class DonHangModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDonHang($id_dh) {
        $query = "SELECT * FROM donhang WHERE id_dh = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_dh]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getChiTietDonHang($id_dh) {
        $query = "SELECT * FROM chitiet_donhang WHERE id_dh = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_dh]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
