<?php

// function loadall_taikhoan()
// {
//     $sql = "SELECT * FROM taikhoan ORDER BY id_tk DESC";
//     return pdo_query($sql);
// }

// function checkuser($ten, $mk)
// {
//     $sql = "SELECT * FROM taikhoan WHERE ten = ? AND mk = ?";
//     return pdo_query_one($sql, array($ten, $mk));
// }

// function delete_taikhoan($id_tk)
// {
//     $sql = "DELETE FROM taikhoan WHERE id_tk = ?";
//     pdo_execute($sql, array($id_tk));
// }

// function insert_taikhoan($ten, $mk, $sdt, $email, $dia_chi, $ten_nd, $trangthai, $role)
// {
//     $sql = "INSERT INTO taikhoan(ten, mk, sdt, email, dia_chi, ten_nd, trangthai, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, array($ten, $mk, $sdt, $email, $dia_chi, $ten_nd, $trangthai, $role));
// }

// function update_taikhoan($id_tk, $ten, $mk, $sdt, $email, $dia_chi, $ten_nd, $trangthai, $role)
// {
//     $sql = "UPDATE taikhoan SET ten = ?, mk = ?, sdt = ?, email = ?, dia_chi = ?, ten_nd = ?, trangthai = ?, role = ? WHERE id_tk = ?";
//     pdo_execute($sql, array($ten, $mk, $sdt, $email, $dia_chi, $ten_nd, $trangthai, $role, $id_tk));
// }

// function checkemail($email)
// {
//     $sql = "SELECT * FROM taikhoan WHERE email = ?";
//     return pdo_query_one($sql, array($email));
// }

function insert_taikhoan($ten, $mk, $email)
{
    $sql = "INSERT INTO taikhoan (ten, mk, email ) VALUES ( ?, ?, ?)";
    pdo_execute($sql, $ten, $mk, $email);
}
function check_user($email, $mk)
{
    
    $sql = "SELECT * FROM taikhoan WHERE email = ? AND mk = ?";
    return pdo_query_one($sql, [$email, $mk]);
}
