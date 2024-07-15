?><?php
// session_start();
// ob_start();
// include "model/pdo.php";
// include "model/sanpham.php";
// include "model/taikhoan.php";
// include "model/danhmuc.php";
// include "model/cart.php";
// include "gobal.php";
// if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

// $spnew = loadall_sanpham_home();
// $dsdm = loadall_danhmuc_home();
// $sptop = loadall_sanpham_top5();

// $top10 = top10_sanpham();
// $dssp = danhsach_sanpham();
// $dsdp = danhsach_danhmuc();
// 

// <?php
// include "view/header.php";
// if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
//     $act = $_GET['act'];
//     switch ($act) {

//         case 'sanphamct':
//             if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
//                 $id = $_GET['idsp'];
//                 $onesp = loadone_sanpham($id);
//                 extract($onesp);
//                 $sp_cungloai = load_sanpham_cungloai($id, $iddm);
//                 include "view/sanphamct.php";
//             } else {
//                 include "view/home.php";
//             }
//             break;

//         case 'lienhe':
//             include "view/lienhe.php";
//             break;


//         case 'login': {
//                 if (isset($_POST['sublogin'])) {

//                     $uname = $_POST['user'];
//                     $password = $_POST['pass'];
//                     $checkus = checkuser($uname, $password);
//                     if (is_array($checkus)) {
//                         $_SESSION['checkus'] = $checkus;
//                         header('location: ?act=home');
//                     } else {
//                         $thongbaolg = "Tài khoản sai hoặc không tồn tại vui lòng kiểm tra lại";
//                     }
//                 }
//                 //
//                 include 'view/login/login.php';
//                 break;
//             }

//         case 'logout': {
//                 unset($_SESSION['checkus']);
//                 header('location: ?act=home');
//                 break;
//             }
//         case 'sanpham': {

//                 include "view/sanpham/allsanpham.php";
//                 break;
//             }
//         case 'timkiem':
//             if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
//                 $kyw = $_POST['kyw'];
//             } else {
//                 $kyw = "";
//             }
//             if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
//                 $iddm = $_GET['iddm'];
//             } else {
//                 $iddm = 0;
//             }
//             $dssp = loadall_sanpham($kyw, $iddm);
//             $tendm = load_ten_dm($iddm);
//             include "view/sanpham/allsanpham.php";
//             break;
//         case 'sptheodanhmuc': {
//                 if (isset($_GET['iddm']) && ($_GET['iddm'])) {
//                     $spcungloai = loadsp_theodanhmuc($_GET['iddm']);
//                 }
//                 include "view/chitietdm.php";
//                 break;
//             }
//         case 'dangky':
//             if (isset($_POST['dangky']) && ($_POST['dangky'])) {
//                 $user = $_POST['user'];
//                 $email = $_POST['email'];
//                 $pass = $_POST['pass'];
//                 insert_taikhoan($user, $email, $pass);
//                 header('location: ?act=login');
//             }
//             include "view/login/dangki.php";
//             break;
//         case 'edittk':
//             if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
//                 $user = $_POST['user'];
//                 $pass = $_POST['pass'];
//                 $email = $_POST['email'];
//                 $address = $_POST['address'];
//                 $tel = $_POST['tel'];
//                 $id = $_POST['id'];
//                 update_taikhoan($id, $user, $pass, $email, $address, $tel);
//                 $_SESSION['user'] = checkuser($user, $pass); //cạp nhật mới lại sau khi đã edit
//                 $thongbao = "Cập nhật thành công!";
//             }
//             include "view/login/edit.php";
//             break;
//         case 'quenmk':
//             if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
//                 $email = $_POST['email'];
//                 $checkemail = checkemail($email);
//                 if (is_array($checkemail)) {
//                     $thongbao = "Mật khẩu của bạn là :" . $checkemail['pass'];
//                 } else {
//                     $thongbao = "Email này không tồn tại";
//                 }
//             }
//             include "view/login/quenmk.php";
//             break;
//         case 'home': {
//                 include "view/home.php";
//                 break;
//             }
//         case 'buy': {
//                 if (isset($_POST['submitbuy'])) {
//                     $idsp = $_POST['idsp'];
//                     $img = $_POST['img'];
//                     $name = $_POST['namesp'];
//                     $gia = $_POST['gia'];
//                     $sl = $_POST['sl'];
//                     $ttien = tongbill();
//                     $addcart = [$idsp, $img, $name, $gia, $sl, $ttien];
//                     array_push($_SESSION['giohang'], $addcart);
//                     header('location: ?act=sanpham');
//                 }
//                 break;
//             }
//         case 'delhd': { // xóa sản phẩm trong dah mục
//                 if (isset($_GET['idhd'])) {
//                     array_splice($_SESSION['giohang'], $_GET['idhd'], 1);
//                 } else {
//                     $_SESSION['giohang'] = [];
//                 }
//                 header('location: ?act=sanpham');
//                 break;
//             }
//         case 'bill': {
//                 include 'view/bill.php';
//                 break;
//             }

//         case 'cfbill': {
//                 if (isset($_POST['submitmuahang'])) {

//                     if (isset($_SESSION['checkus'])) {
//                         $iduser = $_SESSION['checkus']['id'];
//                     } else {
//                         $iduser = 0;
//                     }
//                     $name = $_POST['hoten'];
//                     $email = $_POST['mail'];
//                     $diachi = $_POST['address'];
//                     $sdt = $_POST['numberphone'];
//                     $datedh = date('Y-m-d');
//                     $tongbill = tongbill();
//                     $pttt = $_POST['pttt'];
//                     $id = add_bill($name, $email, $diachi, $sdt, $pttt, $datedh, $tongbill, $iduser);

//                     foreach ($_SESSION['giohang'] as $cart) {

//                         add_cart($_SESSION['checkus']['id'], $cart[0], $cart[1], $cart[3], $cart[2], $cart[4], $cart[5], $id);
//                     }
//                     $_SESSION['giohang'] = [];
//                 }
//                 $listbill = loadone_bill($id);
//                 $billct = loadone_card($id);
//                 include 'view/hoadon.php';

//                 break;
//             }
//         case 'lichsudonhang': {
//                 if (isset($_SESSION['checkus']) && ($_SESSION['checkus'])) {
//                     $idkh =  $_SESSION['checkus']['id'];
//                     $dh = loadallbill_kh($idkh);
//                 }
//                 include 'view/lichsudonhang.php';
//                 break;
//             }
//         case 'huydh': {
//                 if (isset($_GET['iddh']) && ($_GET['iddh'])) {
//                     huy($_GET['iddh']);
//                     header('location: ?act=lichsudonhang');
//                 }
//                 break;
//             }
//         case 'nhanhang': {
//                 if (isset($_GET['iddh']) && ($_GET['iddh'])) {
//                     nhan($_GET['iddh']);
//                     header('location: ?act=lichsudonhang');
//                 }
//                 break;
//             }

//         case 'ctdonhang': {
//                 if (isset($_GET['iddh']) && ($_GET['iddh'])) {
//                     $dh = loadone_card($_GET['iddh']);
//                 }
//                 include 'view/chitietdh.php';
//                 break;
//             }







//         default:
//             include "view/home.php";
//             break;
//     }
// } else {
//     include "view/home.php";
// }

// include "view/footer.php";
?>
