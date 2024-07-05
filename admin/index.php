<?php

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case 'adddm':
            if (isset($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $hinh = $_FILES['hinh']['name'];
                // uploaad file lên thư mục upload lấy tren w3sc
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_danhmuc($tenloai, $hinh);
                $thongbao = "Thêm thành công";
                // header("location:?act=listdm");
            }
            include "danhmuc/add.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_danhmuc($id, $tenloai, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            /*-----------------------------hết phàn của admin------------------------- */
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $giamgia = $_POST['giamgia'];
                // uploaad file lên thư mục upload lấy tren w3sc
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm, $giamgia);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);/*tham số truyefn vào */
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);/*sau khi xóa xong biến ko có giá trị ta sẽ cho chúng là rỗng và 0 */
            include "sanpham/list.php";
            break;
        case 'updatesp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                /*1 cái id la cua sp 1 cai la cua hidden */
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mote'];
                $hinh = $_FILES['hinh']['name'];
                $giamgia = $_POST['giamgia'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $giamgia);
                $thongbao = "Cập nhật thành công";
                header('location: ?act=listsp');
            }
            $listdanhmuc = loadall_danhmuc();/*gọi ra để hiển thị trong form update */
            include "sanpham/update.php";
            break;
            // case 'updatesp':

            //     $listdanhmuc = loadall_danhmuc();
            //     $listsanpham = loadall_sanpham();
            //     include "sanpham/list.php";
            //     break;
        case 'taikhoan':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/binhluan.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/binhluan.php";
            break;



        case 'donhang': {
                $listbill = loadall_bill();
                include 'donhang/listdh.php';
                break;
            }
        case 'ttdh': {
                if (isset($_GET['iddh']) && ($_GET['iddh'])) {
                    $bill = loadone_bill($_GET['iddh']);
                }
                if (isset($_POST['btnsub'])) {
                    $iddh = $_POST['iddh'];
                    $ttdh = $_POST['ttdh'];
                    thaydoi_trangthai($ttdh, $iddh);
                    header('location: ?act=donhang');
                }
                include 'donhang/ttdh.php';
                break;
            }
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke.php";
            break;
        case 'bieudo':
            if (isset($_POST['btnsub'])) {
                $listthongke = loadall_thongke();
            }

            if (isset($_POST['tk_donhang'])) {
                $listthongke_thang = load_thongke_sanpham_donhang();
            }

            if (isset($_GET['type']) && $_GET['type'] == 'month') {
                $listthongke_thang = load_thongke_sanpham_donhang();
            } else if (isset($_GET['type']) && $_GET['type'] == 'week') {
                $listthongke_tuan = load_thongke_sanpham_donhang_tuan();
            } else if (isset($_GET['type']) && $_GET['type'] == 'day') {
                $listthongke_ngay = load_thongke_sanpham_donhang_ngay();
                //                                 echo "<pre>";
                // print_r($listthongke_ngay);
                // die;
            } else {
                $listthongke_thang = load_thongke_sanpham_donhang();
            }

            include "bieudo.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
