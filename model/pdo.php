<?php

/**
 * Lấy kết nối PDO đến cơ sở dữ liệu
 * @return PDO đối tượng kết nối PDO
 */
function pdo_get_connection() {
    $dburl = "mysql:host=localhost;dbname=da1_;charset=utf8";
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

/**
 * Thực thi câu lệnh SQL thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh SQL
 * @param array $sql_args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
// function pdo_execute($sql, $sql_args = array()) {
//     try {
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//     } catch (PDOException $e) {
//         throw $e;
//     } finally {
//         unset($conn);
//     }
// } 
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

/**
 * Thực thi câu lệnh SQL INSERT và trả về ID của bản ghi vừa được thêm vào
 * @param string $sql câu lệnh SQL INSERT
 * @param array $sql_args mảng giá trị cung cấp cho các tham số của $sql
 * @return int ID của bản ghi vừa được thêm vào
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute_return_lastInsertId($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL SELECT và trả về tất cả các bản ghi
 * @param string $sql câu lệnh SQL SELECT
 * @param array $sql_args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

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


/**
 * Thực thi câu lệnh SQL SELECT và trả về một bản ghi đầu tiên
 * @param string $sql câu lệnh SQL SELECT
 * @param array $sql_args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi đầu tiên
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SQL SELECT và trả về một giá trị đầu tiên của bản ghi đầu tiên
 * @param string $sql câu lệnh SQL SELECT
 * @param array $sql_args mảng giá trị cung cấp cho các tham số của $sql
 * @return mixed giá trị đầu tiên của bản ghi đầu tiên
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Lấy thông tin sản phẩm theo ID
 * @param int $productId ID sản phẩm
 * @return array mảng chứa thông tin sản phẩm
 */
function getProductById($productId) {
    $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
    return pdo_query_one($sql, [$productId]);
}

?>
<?php







