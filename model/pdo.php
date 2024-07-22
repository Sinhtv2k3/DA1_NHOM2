<?php

function pdo_get_connection() {
    $dburl = "mysql:host=localhost;dbname=da1_;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        error_log("Lỗi SQL: " . $e->getMessage());
        throw $e;
    }
}

function pdo_execute_return_lastInsertId($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        error_log("Lỗi SQL: " . $e->getMessage());
        throw $e;
    }
}

function pdo_query($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi SQL: " . $e->getMessage());
        throw $e;
    }
}

function pdo_query_one($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Lỗi SQL: " . $e->getMessage());
        throw $e;
    }
}

function pdo_query_value($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;
    } catch (PDOException $e) {
        error_log("Lỗi SQL: " . $e->getMessage());
        throw $e;
    }
}
?>
