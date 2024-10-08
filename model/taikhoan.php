<?php

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
function update_taikhoan($id_tk, $ten, $sdt, $email, $dia_chi, $trangthai) {
    try {
        $conn = pdo_get_connection();
        $sql = "UPDATE taikhoan SET ten = ?, sdt = ?, email = ?, dia_chi = ?, trangthai = ? WHERE id_tk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ten, $sdt, $email, $dia_chi, $trangthai, $id_tk]);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
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
