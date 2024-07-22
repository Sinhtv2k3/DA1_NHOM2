<?php
session_start();
ob_start();
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

$action = isset($_GET['act']) ? $_GET['act'] : '';
$spnew = loadall_sanpham_home();
$listdanhmuc = loadall_danhmuc();

include "view/header.php";
include "view/banner.php";
include "view/home.php";
include "view/footer.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangki':
            if (isset($_POST['dangki'])) {
                $ten = $_POST['username'];
                $email = $_POST['email'];
                $mk = $_POST['password'];
                insert_taikhoan($ten, $email, $mk);
                header('location: ?act=login');
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
                    header('Location: index.php');
                    exit();
                } else {
                    $error = "Đăng nhập thất bại! Vui lòng kiểm tra lại email và mật khẩu";
                }
            }
            include "view/taikhoan/login.php";
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
            }
            include "view/giohang.php";
            break;
        default:
            include "view/home.php";
            break;
    }
}
