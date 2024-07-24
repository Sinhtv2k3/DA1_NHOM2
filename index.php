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
$sptop = loadall_sanpham_top5();
include "view/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
        switch ($act) {
        case 'dangki':
           
                        if (isset($_POST['dangki']) ) {
                            $ten = $_POST['username'];
                            $mk = $_POST['password'];
                            $email = $_POST['email'];
                            
                            insert_taikhoan($ten,$mk, $email);
        
                        }
                        include "view/taikhoan/dangki.php"; 
                        break;
        //  case 'login':
                        
        //                 if (isset($_POST['dangnhap']) ) {
                            
        //                     $email = $_POST['email'];
        //                     $mk = $_POST['password'];
                            
        //                     $checkusername = check_user($email,$mk);  
        //                     var_dump($checkusername);
        //                     if(is_array($checkusername)){
        //                         echo "hello";
        //                         $_SESSION['username']=$checkusername;
        //                        // $thongbao="bạn đã đăng nhập thành công";
        //                         //echo $thongbao;
        //                          header('Location: index.php');
                           
        //                     }else{
        //                         $thongbao="tai khoan khong ton tai";
        //                     }                    
        //                 }
        //                 // include "view/taikhoan/login.php"; 
        //                 break;

                        case 'login': 
                            if (isset($_POST['dangnhap'])) {
            
                                $email = $_POST['email'];
                                $mk = $_POST['password'];
                                $checkus = check_user($email, $mk);
                                if (is_array($checkus)) {
                                    $_SESSION['checkus'] =$checkus;
                                    header('location: ?act home');
                                } else {
                                    $thongbaolg = "Tài khoản sai hoặc không tồn tại vui lòng kiểm tra lại";
                                }
                            }
                            //
                            include 'view/taikhoan/login.php';
                            break;

                            case 'logout': {
                                unset($_SESSION['checkus']);
                                header('location:?act home');
                                break;
                            }
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
} else {
    include "view/home.php";
}

include "view/footer.php";
?>
