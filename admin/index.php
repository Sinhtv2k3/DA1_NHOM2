<?php

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/donhang.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            /*-----------------------------CRUD DANH MỤC------------------------- */
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;
        case 'xoadm':
            if (isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {
                delete_danhmuc($_GET['id_dm']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;
        case 'adddm':
            if (isset($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $trangthai = '0';

                insert_danhmuc(NULL, $tenloai, $trangthai);

                $thongbao = "Thêm thành công";
                header("location:index.php?act=listdm");
                exit();
            }
            include "danhmuc/add.php";
            break;

        case 'suadm':
            if (isset($_POST['capnhat'])) {
                $id_dm = $_POST['id_dm'];
                $tenloai = $_POST['tenloai'];
                $trangthai = $_POST['trangthai'];

                update_danhmuc($id_dm, $tenloai, $trangthai);

                $thongbao = "Cập nhật thành công";
                header("location: index.php?act=listdm");
                exit();
            } elseif (isset($_GET['id'])) {
                $id_dm = $_GET['id'];
                $danhmuc = loadone_danhmuc($id_dm);
            }
            include "danhmuc/update.php";
            break;

            /*-----------------------------CRUD DANH MỤC------------------------- */

            /*-----------------------------CRUD SẢN PHẨM------------------------- */
            /// Sản phẩm
        case 'listsp':
            $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
            $id_dm = isset($_POST['id_dm']) ? $_POST['id_dm'] : 0;
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $id_dm);
            include "sanpham/listsp.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/listsp.php";
            break;
        case 'addsp':
            if (isset($_POST['themmoi'])) {
                // Xử lý khi nhấn nút "Thêm Mới"
                $tensp = isset($_POST['ten_sp']) ? $_POST['ten_sp'] : '';
                $giasp = isset($_POST['gia']) ? $_POST['gia'] : '';
                $hinh = isset($_FILES['anh']['name']) ? $_FILES['anh']['name'] : '';
                $mota = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';
                $id_dm = isset($_POST['id_dm']) ? $_POST['id_dm'] : '';
                $so_luong = isset($_POST['so_luong']) ? $_POST['so_luong'] : 0;
                $trangthai = 0;

                // Kiểm tra và xử lý lỗi khi id_dm không hợp lệ
                if (!load_ten_dm($id_dm)) {
                    $thongbao = "Lỗi: Danh mục sản phẩm không hợp lệ.";
                    include "error.php"; // Hoặc hiển thị lỗi ra màn hình
                    break;
                }

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);

                // Kiểm tra lỗi và xử lý tệp tải lên
                if ($_FILES['anh']['error'] === UPLOAD_ERR_OK) {
                    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                        // Thêm sản phẩm vào cơ sở dữ liệu sau khi tệp tải lên thành công
                        insert_sanpham($tensp, $giasp, $hinh, $so_luong, $mota, $id_dm, $trangthai);
                        $thongbao = "Thêm sản phẩm thành công";
                    } else {
                        $thongbao = "Lỗi khi upload file";
                    }
                } else {
                    $thongbao = "Lỗi khi upload file: " . $_FILES['anh']['error'];
                }

                // Cập nhật danh sách danh mục và sản phẩm sau khi thêm mới
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0);

                // Hiển thị thông báo và danh sách sản phẩm
                include "sanpham/listsp.php";
                break;
            }

            // Hiển thị form thêm sản phẩm ban đầu
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;


        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat'])) {
                $id = isset($_POST['id']) ? $_POST['id'] : null;
                $iddm = isset($_POST['iddm']) ? $_POST['iddm'] : null;
                $tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
                $giasp = isset($_POST['giasp']) ? $_POST['giasp'] : '';
                $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
                $hinh = isset($_FILES['hinh']['name']) ? $_FILES['hinh']['name'] : '';
                $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
                $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : 0;

                if ($_FILES['hinh']['error'] === UPLOAD_ERR_OK) {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {

                        update_sanpham($id, $iddm, $tensp, $giasp, $mota, basename($_FILES["hinh"]["name"]), $soluong, $trangthai);
                        $thongbao = "Cập nhật thành công";
                    } else {
                        $thongbao = "Lỗi khi upload file";
                    }
                } else {

                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $sanpham['anh'], $soluong, $trangthai);
                    $thongbao = "Cập nhật thành công";
                }

                header("Location: index.php?act=listsp");
                exit();
            }
            break;

        case 'listtk':
            // Lấy từ POST nếu có tìm kiếm
            $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
            $id_dm = isset($_POST['id_dm']) ? $_POST['id_dm'] : 0;
            $role = isset($_POST['role']) ? $_POST['role'] : null;

            // Gọi hàm để lấy danh sách tài khoản
            $listtaikhoan = loadall_taikhoan($kyw, $id_dm, $role);

            // Bao gồm tệp view để hiển thị
            include "taikhoan/listtk.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan('', 0);
            include "taikhoan/listtk.php";
            break;
        case 'update':
            // Hiển thị trang cập nhật và load thông tin tài khoản
            if (isset($_GET['id_tk']) && $_GET['id_tk'] > 0) {
                $id_tk = $_GET['id_tk'];
                $taikhoan = loadone_taikhoan($id_tk); // Tải thông tin tài khoản
                if (!$taikhoan) {
                    echo "Tài khoản không tồn tại!";
                    exit();
                }
                include "taikhoan/update.php"; // Hiển thị form cập nhật
            } else {
                echo "ID tài khoản không hợp lệ!";
                exit();
            }
            break;

            // Xử lý cập nhật
            if (isset($_POST['capnhat'])) {
                $id_tk = $_POST['id_tk'];
                $ten = $_POST['ten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                // Gọi hàm update_taikhoan mà không bao gồm mật khẩu
                update_taikhoan($id_tk, $ten, $email, $sdt, $dia_chi);
                // Redirect hoặc thông báo sau khi cập nhật
            }

        case 'updateprocess':
            // Xử lý cập nhật tài khoản
            if (isset($_POST['capnhat'])) {
                $id_tk = isset($_POST['id_tk']) ? $_POST['id_tk'] : null;
                $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
                $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : '';
                $ten_nd = isset($_POST['ten_nd']) ? $_POST['ten_nd'] : '';
                $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : 0;
                $role = isset($_POST['role']) ? $_POST['role'] : '';

                // Cập nhật tài khoản
                update_taikhoan($id_tk, $ten, $sdt, $email, $dia_chi, $ten_nd, $trangthai, $role);

                $thongbao = "Cập nhật thành công";
                header("Location: index.php?act=listtk");
                exit();
            } else {
                echo "Không nhận được dữ liệu để cập nhật!";
                exit();
            }
            break;

        case 'listdh':
            $listdonhang = loadall_donhang();
            include "donhang/listdh.php";
            break;

        case 'accept_donhang':
            $id_dh = $_GET['id'];
            update_donhang($id_dh, 1); // Cập nhật trạng thái thành "Đang giao"
            header('Location: index.php?act=listdh');
            exit();
            break;
        case 'track_donhang':
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id_dh = $_GET['id'];
                update_donhang($id_dh, 2); // Chuyển trạng thái đơn hàng thành "Hoàn Thành" (2)
            } else {
                echo "ID đơn hàng không hợp lệ.";
            }
            header('Location: index.php?act=listdh');
            exit();
            break;

        case 'delete_donhang':
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id_dh = $_GET['id'];
                delete_donhang($id_dh); // Xóa đơn hàng
            } else {
                echo "ID đơn hàng không hợp lệ.";
            }
            header('Location: index.php?act=listdh');
            exit();


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
