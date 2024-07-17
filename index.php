<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/danhmuc.php";
include "model/cart.php";
include "gobal.php"; // Sửa lỗi từ `gobal.php` thành `global.php`

if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

// $spnew = loadall_sanpham_home();
// $listdanhmuc = loadall_danhmuc_home();
// $sptop = loadall_sanpham_top5();
// $listdanhmuc = loadall_danhmuc();
$listdanhmuc = loadall_danhmuc();
$top10 = loadall_sanpham_home(); // Hoặc hàm phù hợp khác để lấy sản phẩm nổi bật
 // Lấy danh sách tất cả sản phẩm
// $top5 = top55_sanpham();
// $top10 = top10_sanpham();
// $dssp = danhsach_sanpham();
//  $listdanhmuc = danhsach_danhmuc();

include "view/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case 'sanphamct':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $id = $_GET['id_sp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cungloai = load_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'lienhe':
            include "view/lienhe.php";
            break;

        case 'login':
            if (isset($_POST['sublogin'])) {
                $uname = $_POST['user'];
                $password = $_POST['pass'];
                $checkus = checkuser($uname, $password);
                if (is_array($checkus)) {
                    $_SESSION['checkus'] = $checkus;
                    header('location: ?act=home');
                } else {
                    $thongbaolg = "Tài khoản sai hoặc không tồn tại vui lòng kiểm tra lại";
                }
            }
            include 'view/login/login.php';
            break;

        case 'logout':
            unset($_SESSION['checkus']);
            header('location: ?act=home');
            break;

        case 'sanpham':
            include "view/sanpham/allsanpham.php";
            break;

        case 'timkiem':
            $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";
            $iddm = isset($_GET['iddm']) && $_GET['iddm'] > 0 ? $_GET['iddm'] : 0;
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham/allsanpham.php";
            break;

        case 'sptheodanhmuc':
            if (isset($_GET['iddm']) && $_GET['iddm']) {
                $spcungloai = loadsp_theodanhmuc($_GET['iddm']);
            }
            include "view/chitietdm.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                insert_taikhoan($user, $email, $pass);
                header('location: ?act=login');
            }
            include "view/login/dangki.php";
            break;

        case 'edittk':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass); // Cập nhật mới lại sau khi đã edit
                $thongbao = "Cập nhật thành công!";
            }
            include "view/login/edit.php";
            break;

        case 'quenmk':
            if (isset($_POST['guiemail']) && $_POST['guiemail']) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là :" . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/login/quenmk.php";
            break;

        case 'home':
            include "view/home.php";
            break;

        case 'buy':
            if (isset($_POST['submitbuy'])) {
                $idsp = $_POST['idsp'];
                $img = $_POST['img'];
                $name = $_POST['namesp'];
                $gia = $_POST['gia'];
                $sl = $_POST['sl'];
                $ttien = tongbill();
                $addcart = [$idsp, $img, $name, $gia, $sl, $ttien];
                array_push($_SESSION['giohang'], $addcart);
                header('location: ?act=sanpham');
            }
            break;

        case 'delhd':
            if (isset($_GET['idhd'])) {
                array_splice($_SESSION['giohang'], $_GET['idhd'], 1);
            } else {
                $_SESSION['giohang'] = [];
            }
            header('location: ?act=home');
            break;

        case 'addbill':
            if (isset($_POST['addbill'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id_tk = $_SESSION['checkus']['id_tk'];
                $id_sp = $_POST['idsp'];
                add_hoadon($name, $email, $address, $tel, $id_tk, $id_sp);
                $_SESSION['giohang'] = [];
            }
            include "view/bill/bill.php";
            break;

        case 'giohang':
            include "view/giohang.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
?>
