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
// }