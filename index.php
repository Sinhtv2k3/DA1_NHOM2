<?php
session_start();

include_once "model/pdo.php";
include_once "model/sanpham.php";
include_once "model/taikhoan.php";
include_once "model/danhmuc.php";
include_once "model/cart.php";
include_once "model/hoadon.php";
include_once "model/donhang.php";
include_once "gobal.php";

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = [];
}

$act = isset($_GET['act']) ? $_GET['act'] : '';
$spnew = loadall_sanpham_home();
$listdanhmuc = loadall_danhmuc();
$sptop = loadall_sanpham_top5();

// Xử lý các hành động cụ thể
if ($act) {
    switch ($act) {
        case 'dangky':
            if (isset($_POST['dangky'])) {
                $ten = $_POST['username'];
                $email = $_POST['email'];
                $mk = $_POST['password'];

                if (strlen($mk) < 6) {
                    $_SESSION['register_error'] = "Mật khẩu phải có ít nhất 6 ký tự!";
                } else {
                    insert_taikhoan($ten, $mk, $email);
                    $_SESSION['register_message'] = "Đăng ký thành công! Đang chuyển hướng đến trang đăng nhập...";
                    header('Location: /DA1_NHOM2/index.php?act=dangky');
                    exit();
                }
            }
            include "view/taikhoan/dangki.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $mk = $_POST['password'];
                $user = check_user($email, $mk);
                if ($user) {
                    $_SESSION['user'] = $user;
                    $_SESSION['id_tk'] = $user['id_tk'];
                    $_SESSION['login_message'] = "Đăng nhập thành công!";
                    header('Location: /DA1_NHOM2/index.php');
                    exit();
                } else {
                    $_SESSION['login_message'] = "Đăng nhập thất bại! Vui lòng kiểm tra lại email và mật khẩu";
                    header('Location: /DA1_NHOM2/view/taikhoan/dangnhap.php');
                    exit();
                }
            }
            break;

        case 'sanphamct':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $id = $_GET['id_sp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'addToCart':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addToCart'])) {
                $id_sp = $_POST['id_sp'];
                $ten_sp = $_POST['ten_sp'];
                $anh = $_POST['anh'];
                $gia = $_POST['gia'];
                $soluong = 1;
                $ttien = $soluong * $gia;
                $spadd = [$id_sp, $ten_sp, $anh, $gia, $soluong, $ttien];
                array_push($_SESSION['myCart'], $spadd);

                header("Location: http://localhost/DA1_NHOM2/view/giohang.php");
                exit();
            }
            break;

        case 'remove_from_cart':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if (isset($_SESSION['myCart'])) {
                    $cart = $_SESSION['myCart'];
                    $found = false;
                    foreach ($cart as $key => $item) {
                        if ($item[0] === $id) {
                            unset($cart[$key]);
                            $_SESSION['myCart'] = array_values($cart);
                            $found = true;
                            break;
                        }
                    }
                    if ($found) {
                        echo json_encode(['status' => 'success']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không tìm thấy']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Giỏ hàng không tồn tại']);
                }
                exit();
            }
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                if (isset($_SESSION['myCart'][$idcart])) {
                    array_splice($_SESSION['myCart'], $idcart, 1);
                }
            } else {
                $_SESSION['myCart'] = []; // Xóa toàn bộ giỏ hàng
            }
            header('Location: http://localhost/DA1_NHOM2/view/giohang.php');
            exit; // Thoát để ngăn không cho mã tiếp tục chạy
            break;

        case 'bill':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])) {
                $ngay_dat = date('Y-m-d');
                $ten_nd = $_POST['name'];
                $sdt = $_POST['phone'];
                $email = $_POST['email'];
                $dia_chi = $_POST['address'];
                $payment_method = $_POST['payment_method']; // Giả sử bạn có trường này trong form
                $id_tk = $_SESSION['user']['id_tk']; // Giả sử id_tk có trong $_SESSION['user']

                try {
                    // Thêm đơn hàng
                    $id_dh = insert_donhang($ngay_dat, $ten_nd, $sdt, $email, $dia_chi, $payment_method, $id_tk);

                    // Thêm chi tiết đơn hàng
                    foreach ($_SESSION['myCart'] as $item) {
                        insert_chitiet_donhang($id_dh, $item[0], $item[1], $item[3], $item[4], $item[5], $id_tk);
                    }

                    // Xóa giỏ hàng sau khi đặt hàng thành công
                    $_SESSION['myCart'] = [];

                    // Chuyển hướng đến trang thông báo thành công
                    $_SESSION['order_message'] = "Đặt hàng thành công!";
                    header('Location: http://localhost/DA1_NHOM2/view/success.php');
                    exit();
                } catch (Exception $e) {
                    // Xử lý lỗi nếu có
                    $_SESSION['order_message'] = "Có lỗi xảy ra khi đặt hàng: " . $e->getMessage();
                    header('Location: http://localhost/DA1_NHOM2/view/giohang.php');
                    exit();
                }
            }
            include "view/bill.php";
            break;


        case 'capnhaptk':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['capnhat'])) {
                $id_tk = $_POST['id'];
                $ten = $_POST['username'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $mk = $_POST['password'];

                // Gọi hàm cập nhật tài khoản
                update_taikhoan($id_tk, $ten, $email, $tel, $address, $mk);
                header('Location: /DA1_NHOM2/index.php?act=capnhaptk');
                // Đặt thông báo thành công hoặc thất bại
                $thongbao = "Cập nhật tài khoản thành công.";
            }
            break;

        case 'donhang':
            // Lấy id_tk từ session hoặc request
            $id_tk = $_SESSION['id_tk'] ?? null; // Hoặc $_GET['id_tk'] nếu muốn lấy từ URL

            // Kiểm tra xem id_tk có hợp lệ không
            if (!$id_tk) {
                echo 'Thông tin tài khoản không hợp lệ.';
                exit;
            }

            // Lấy danh sách đơn hàng của người dùng
            $listdonhang = load_donhang_user($id_tk);

            // Bao gồm trang hiển thị đơn hàng của người dùng
            include 'view/donhang.php';
            break;
        case 'filterProducts':
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $products = loadall_sanpham('', $category);
            foreach ($products as $sp) {
                $id = $sp['id_sp'];
                $ten_sp = $sp['ten_sp'];
                $gia = $sp['gia'];
                $anh = $img_path . $sp['anh'];
                $linksp = "index.php?act=sanphamct&id_sp=" . $id;
                echo '<div class="product-card">
                                <a href="' . $linksp . '"><img src="' . $anh . '"></a>
                                <h3>' . $ten_sp . '</h3>
                                <p>' . $gia . ' VND</p>
                                <form action="index.php?act=addToCart" method="POST">
                                    <input type="hidden" name="id_sp" value="' . $id . '">
                                    <input type="hidden" name="ten_sp" value="' . $ten_sp . '">
                                    <input type="hidden" name="anh" value="' . $anh . '">
                                    <input type="hidden" name="gia" value="' . $gia . '">
                                    <button type="submit" name="addToCart" value="1">Thêm vào Giỏ</button>
                                </form>
                            </div>';
            }
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    // Include các file view chuẩn
    include "view/header.php";
    include "view/banner.php";
    include "view/home.php";
    include "view/footer.php";
}
