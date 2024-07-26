<?php
// Đặt thông tin kết nối cơ sở dữ liệu
define('DB_SERVER', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_DATABASE', 'da1'); 

// Kết nối đến cơ sở dữ liệu
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    // Thiết lập chế độ lỗi cho PDO để ném ngoại lệ
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Xử lý lỗi kết nối cơ sở dữ liệu
    die("Kết nối cơ sở dữ liệu không thành công: " . $e->getMessage());
}

// Đặt thông tin đường dẫn
define('BASE_URL', 'http://localhost/DA1_NHOM2/'); // URL cơ sở của ứng dụng

// Cấu hình khác (nếu có)
define('UPLOAD_DIR', __DIR__ . '/upload/'); // Đường dẫn đến thư mục tải lên
define('IMAGES_DIR', BASE_URL . 'upload/'); // URL đến thư mục hình ảnh

// Khởi tạo các thiết lập khác nếu cần
// ...
?>
