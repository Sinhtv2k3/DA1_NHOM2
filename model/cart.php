<?php
// session_start();
// $cart = isset($_SESSION['myCart']) ? $_SESSION['myCart'] : [];
// $img_path = "../upload/";
include_once 'pdo.php';
function viewcart() {
    global $tong;
    $cart = isset($_SESSION['myCart']) ? $_SESSION['myCart'] : [];
    $img_path = "../upload/";
    $tong = 0;
    $i = 0;

    foreach ($cart as $item) {
        if (isset($item[2], $item[1], $item[3], $item[4])) {
            $anh = htmlspecialchars($img_path . basename($item[2]));
            $ttien = $item[3] * $item[4];
            $tong += $ttien;

            $xoasp = '<a href="http://localhost/DA1_NHOM2/index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
            $input_quantity = '<input type="number" name="quantity['.$i.']" class="quantity" value="' . htmlspecialchars($item[4]) . '" min="1">';

            echo '<tr id="item-' . htmlspecialchars($item[0]) . '">
                <td><img src="' . $anh . '" alt="Ảnh sản phẩm" style="width: 100px; height: 100px;" onerror="this.src=\'../upload/default.jpg\'"></td>
                <td>' . htmlspecialchars($item[1]) . '</td>
                <td class="item-price">' . number_format($item[3]) . ' VND</td>
                <td>' . $input_quantity . '</td>
                <td class="item-total">' . number_format($ttien) . ' VND</td>
                <td>'.$xoasp.'</td>
            </tr>';
            $i++;
        }
    }
}
function insert_dh($sl, $tong_tien, $ten_nd, $sdt, $dia_chi, $email, $trangthai = 0, $id_hd, $id_sp)
{
    $sql = "INSERT INTO cthoadon (sl, tong_tien, ten_nd, sdt, dia_chi, email, trangthai, id_hd, id_sp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sql_args = array($sl, $tong_tien, $ten_nd, $sdt, $dia_chi, $email, $trangthai, $id_hd, $id_sp);
    pdo_execute($sql, $sql_args);
}

// function loadall_donhang()
// {
//     $sql = "SELECT c.id_ct_hd, c.sl, c.tong_tien, c.ten_nd, c.sdt, c.dia_chi, c.email, c.trangthai, c.id_hd, c.id_sp, h.ngay AS ngay_dat
//             FROM cthoadon c
//             JOIN hoadon h ON c.id_hd = h.id_hd
//             ORDER BY c.id_ct_hd ASC";
//     $listdonhang = pdo_query($sql);
//     return $listdonhang;
// }

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

function removeFromCart($productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}
function addOrder($data, $cartItems) {
    global $conn;
    
    // Thêm đơn hàng vào bảng donhang
    $stmt = $conn->prepare("INSERT INTO donhang (ngay_dat, ten_nd, sdt, email, dia_chi, trangthai, id_sp, ten_sp, gia, sl, tongtien) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $date = date('Y-m-d');
    $status = 0;
    
    $totalAmount = 0;
    foreach ($cartItems as $item) {
        $totalAmount += $item[4] * $item[3]; // Số lượng * giá
    }
    
    foreach ($cartItems as $item) {
        $stmt->bind_param("sssissisii", $date, $data['name'], $data['sdt'], $data['email'], $data['address'], $status, $item[0], $item[1], $item[2], $item[3], $item[4]);
        $stmt->execute();
    }

    $stmt->close();
}

// Hàm lấy thông tin đơn hàng từ giỏ hàng
function getCartItems() {
    if (isset($_SESSION['myCart'])) {
        return $_SESSION['myCart'];
    }
    return [];
}