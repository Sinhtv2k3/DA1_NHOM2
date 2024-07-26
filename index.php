<?php
session_start();

include_once "model/pdo.php";
include_once "model/sanpham.php";
include_once "model/taikhoan.php";
include_once "model/danhmuc.php";
include_once "model/cart.php";
include_once "gobal.php";

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = [];
}

$act = isset($_GET['act']) ? $_GET['act'] : '';
$spnew = loadall_sanpham_home();
$listdanhmuc = loadall_danhmuc();

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
                    $_SESSION['login_message'] = "Đăng nhập thành công!";
                    header('Location: /DA1_NHOM2/index.php');
                    exit();
                } else {
                    $error = "Đăng nhập thất bại! Vui lòng kiểm tra lại email và mật khẩu";
                }
            }
            include "view/taikhoan/dangnhap.php";
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
            

        default:
            include "view/home.php";
            break;
    }
} else {
    // Include standard view files
    include "view/header.php";
    include "view/banner.php";
    include "view/home.php";
    include "view/footer.php";
}
?>
