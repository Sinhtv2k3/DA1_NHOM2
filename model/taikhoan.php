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
function show_taikhoan($ten, $sdt, $email, $dia_chi, $ten_nd, $trangthai = 0, $role = 0)
{
    $sql = "INSERT INTO taikhoan (ten, sdt, email, dia_chi, ten_nd, trangthai, role) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sql_args = array($ten, $sdt, $email, $dia_chi, $ten_nd, $trangthai, $role);
    pdo_execute($sql, $sql_args);
}

function loadall_taikhoan($kyw, $id_dm, $role = null)
{
    $conn = pdo_get_connection();

    $sql = "SELECT * FROM taikhoan WHERE ten LIKE :kyw";
    if ($id_dm > 0) {
        $sql .= " AND id_dm = :id_dm";
    }
    if ($role !== null) {
        $sql .= " AND role = :role";
    }

    $stmt = $conn->prepare($sql);

    // Gán giá trị cho các tham số
    $stmt->bindValue(':kyw', "%$kyw%", PDO::PARAM_STR);
    if ($id_dm > 0) {
        $stmt->bindValue(':id_dm', $id_dm, PDO::PARAM_INT);
    }
    if ($role !== null) {
        $stmt->bindValue(':role', $role, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function delete_taikhoan($id_tk)
{
    $sql = "DELETE FROM taikhoan WHERE id_tk = ?";
    pdo_execute($sql, [$id_tk]);
}

function loadone_taikhoan($id)
{
    $sql = "SELECT * FROM taikhoan WHERE id_tk = ?";
    return pdo_query_one($sql, array($id));
}
function update_taikhoan($id_tk, $ten, $email, $sdt, $dia_chi) {
    try {
        $conn = pdo_get_connection(); // Lấy kết nối PDO
        // Câu lệnh SQL đã được cập nhật để không bao gồm cột password
        $sql = "UPDATE taikhoan SET ten = ?, sdt = ?, email = ?, dia_chi = ? WHERE id_tk = ?";
        $stmt = $conn->prepare($sql);
        // Thực thi câu lệnh với các tham số không bao gồm password
        $stmt->execute([$ten, $sdt, $email, $dia_chi, $id_tk]);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $conn = null; // Đảm bảo giải phóng kết nối
    }
}



function insert_taikhoan($ten, $mk, $email)
{
    $sql = "INSERT INTO taikhoan (ten, mk, email) VALUES (?, ?, ?)";
    pdo_execute($sql, [$ten, $mk, $email]);
}

function check_user($email, $mk)
{
    $sql = "SELECT * FROM taikhoan WHERE email = ? AND mk = ?";
    return pdo_query_one($sql, [$email, $mk]);
}
