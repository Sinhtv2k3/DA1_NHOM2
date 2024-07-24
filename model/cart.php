<?php
// function tongbill()
// {
//   $tong = 0;
//   foreach ($_SESSION['giohang'] as $cart) :
//     $tong += $cart[3] * $cart[4];
//   endforeach;
//   return $tong;
// }
// function add_bill($name, $email, $diachi, $sdt, $pttt, $ngaydh, $tongdh, $iduser)
// {
//   $sql = "insert into `bill`(`bill_name`,`bill_email`,`bill_address`,`bill_tel`,`bill_pttt`,`ngaydathang`,`total`,`id_kh`) values('$name','$email','$diachi','$sdt','$pttt','$ngaydh','$tongdh','$iduser')";
//   return pdo_execute_id($sql);
// }
// function add_cart($iduser, $idpro, $img, $price, $name, $sl, $ttien, $idbill)
// {
//   $sql = "insert into `cart`(`iduser`,`idpro`,`img`,`price`,`name`,`soluong`,thanhtien,`idbill`) values('$iduser','$idpro','$img','$price','$name','$sl','$ttien',$idbill)";
//   pdo_execute($sql);
// }

// function loadone_bill($idbill)
// {
//   $sql = "select * from bill where id = $idbill";
//   $result = pdo_query_one($sql);
//   return $result;
// }

// function loadone_card($idbill)
// {
//   $sql = "select * from cart where idbill = $idbill";
//   $result = pdo_query($sql);
//   return $result;
// }

// function loadall_bill()
// {
//   $sql = "select * from bill";
//   return pdo_query($sql);
// }

// function thaydoi_trangthai($ttdh, $iddh)
// {
//   $sql = "update bill set `bill_status` = '$ttdh' where `id` = '$iddh'";
//   pdo_execute($sql);
// }

// function loadallbill_kh($idkh)
// {
//   $sql = "select * from bill where id_kh = $idkh";
//   return pdo_query($sql);
// }
// function loadall_thongke()
// {
//   $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
//   $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
//   $sql .= " group by danhmuc.id order by danhmuc.id desc";
//   $listtk = pdo_query($sql);
//   return $listtk;
// }

// function load_thongke_sanpham_donhang_ngay()
// {
//   $sql = "SELECT 
//       COUNT(bill.id) AS so_luong_ban, 
//       DAY(bill.ngaydathang) AS day_of_month
//   FROM `bill`
//   WHERE bill.bill_status = 3
//   GROUP BY day_of_month
//   ORDER BY day_of_month;";
//   $listsanpham = pdo_query($sql);
//   return  $listsanpham;
// }

// function load_thongke_sanpham_donhang_tuan()
// {
//   $sql = "SELECT 
//       COUNT(bill.id) AS so_luong_ban, 
//       WEEK(bill.ngaydathang) AS week_of_year
//   FROM `bill`
//   WHERE bill.bill_status = 3
//   GROUP BY week_of_year
//   ORDER BY week_of_year;";
//   $listsanpham = pdo_query($sql);
//   return  $listsanpham;
// }

// function load_thongke_sanpham_donhang()
// {
//   $sql = "SELECT 
//   COUNT(bill.id) AS so_luong_ban, 
//   MONTH(bill.ngaydathang) AS month_of_year
//   FROM `bill`
//   WHERE bill.bill_status = 3
//   GROUP BY month_of_year
//   ORDER BY month_of_year;";
//   $listsanpham = pdo_query($sql);
//   return  $listsanpham;
// }
// function huy($iddh)
// {
//   $sql = "update `bill` set `bill_status`='4' where `id` = $iddh";
//   pdo_execute($sql);
// }

// function nhan($iddh)
// {
//   $sql = "update `bill` set `bill_status`='5' where `id` = $iddh";
//   pdo_execute($sql);
<<<<<<< HEAD
// }

function insert_dh($sl, $tong_tien, $ten_nd, $sdt, $dia_chi, $email, $trangthai = 0, $id_hd, $id_sp)
{
    $sql = "INSERT INTO cthoadon (sl, tong_tien, ten_nd, sdt, dia_chi, email, trangthai, id_hd, id_sp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sql_args = array($sl, $tong_tien, $ten_nd, $sdt, $dia_chi, $email, $trangthai, $id_hd, $id_sp);
    pdo_execute($sql, $sql_args);
}

function loadall_donhang()
{
    $sql = "SELECT c.id_ct_hd, c.sl, c.tong_tien, c.ten_nd, c.sdt, c.dia_chi, c.email, c.trangthai, c.id_hd, c.id_sp, h.ngay AS ngay_dat
            FROM cthoadon c
            JOIN hoadon h ON c.id_hd = h.id_hd
            ORDER BY c.id_hd DESC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}


function view_donhang($id)
{
    $sql = "SELECT * FROM cthoadon WHERE id_hd = :id";
    $donhang = pdo_query_one($sql, array(':id' => $id));
    return $donhang;
}

function cancel_donhang($id)
{
    $sql = "DELETE FROM cthoadon WHERE id_hd = :id";
    pdo_execute($sql, array(':id' => $id));
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($productId, $quantity = 1)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        $product = getProductById($productId);
        $_SESSION['cart'][$productId] = [
            'id' => $product['id_sp'],
            'name' => $product['ten_sp'],
            'price' => $product['gia'],
            'image' => $product['anh'],
            'quantity' => $quantity
        ];
    }
}

// Hàm xóa sản phẩm khỏi giỏ hàng
function removeFromCart($productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

function addOrder($name, $email, $phone, $address, $cart)
{
    $conn = new mysqli('localhost', 'root', '', 'da1');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Thêm thông tin hóa đơn vào bảng hoadon
    $stmt = $conn->prepare("INSERT INTO hoadon (ngay, ten, email, dia_chi, sdt, id_tk) VALUES (NOW(), ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $email, $address, $phone, $_SESSION['user_id']);
    $stmt->execute();

    $id_hd = $stmt->insert_id; // Lấy ID hóa đơn mới tạo

    // Thêm thông tin chi tiết hóa đơn vào bảng cthoadon
    foreach ($cart as $item) {
        $stmt = $conn->prepare("INSERT INTO cthoadon (sl, tong_tien, ten_nd, sdt, dia_chi, email, trangthai, id_hd, id_sp) VALUES (?, ?, ?, ?, ?, ?, 0, ?, ?)");
        $ttien = $item[3] * $item[4];
        $stmt->bind_param("iissssii", $item[4], $ttien, $name, $phone, $address, $email, $id_hd, $item[0]);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();
}
