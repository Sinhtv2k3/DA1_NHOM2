<?php
 function insert_taikhoan($ten, $mk, $email) {
        $sql = "INSERT INTO taikhoan (ten, mk, email ) VALUES ( ?, ?, ?)";
        pdo_execute($sql, $ten,$mk,$email);
    }
?>