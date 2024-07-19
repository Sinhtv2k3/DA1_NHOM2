<?php
session_start();
ob_start();
include_once "model/pdo.php";
include_once "model/sanpham.php";
include_once "model/taikhoan.php";
include_once "model/danhmuc.php";
include_once "model/cart.php";
include_once "gobal.php"; // Đảm bảo đúng tên file

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
include "view/banner.php";
include "view/home.php";
include "view/footer.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
        switch ($act) {
        case 'dangki':
           
                        if (isset($_POST['dangki']) ) {
                            echo "hello";
                            $ten = $_POST['username'];
                            $email = $_POST['email'];
                            $mk = $_POST['password'];
                            insert_taikhoan($ten, $email, $mk);
                            header('location: ?act=login');
                        }
                        include "view/login/dangki.php"; 
                        break;
    
             
        default:
            include "view/home.php";
            break;
} 

}