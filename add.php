<?php
// Database Connection
if (!class_exists('Database')) {
    class Database {
        private static $conn = null;

        public static function getConnection() {
            if (self::$conn == null) {
                self::$conn = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        }
    }
}

// Model
if (!class_exists('Category')) {
    class Category {
        public static function addCategory($tenloai, $hinh) {
            $conn = Database::getConnection();
            $sql = "INSERT INTO categories (tenloai, hinh) VALUES (:tenloai, :hinh)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['tenloai' => $tenloai, 'hinh' => $hinh]);
        }
        
        public static function getAllCategories() {
            $conn = Database::getConnection();
            $sql = "SELECT * FROM categories";
            $stmt = $conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

// Controller
if (!class_exists('CategoryController')) {
    class CategoryController {
        public function addCategory() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tenloai = $_POST['tenloai'];
                $hinh = $_FILES['hinh']['name'];
                move_uploaded_file($_FILES['hinh']['tmp_name'], "uploads/" . $hinh);
                Category::addCategory($tenloai, $hinh);
                $thongbao = "Thêm danh mục thành công";
                include 'index.php';
            } else {
                include 'index.php';
            }
        }
        
        public function listCategories() {
            $categories = Category::getAllCategories();
            include 'index.php';
        }
    }
}

// Entry Point
$act = isset($_GET['act']) ? $_GET['act'] : 'default';

switch ($act) {
    case 'adddm':
        $controller = new CategoryController();
        $controller->addCategory();
        break;
    case 'listdm':
        $controller = new CategoryController();
        $controller->listCategories();
        break;
    default:
        echo 'Trang chủ';
        break;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Danh mục</title>
</head>
<body>
    <div class="row box">
        <div class="boxtrai">
            <div class="loai logoam tren">
                <img src="../image/logovip.jpg" width="150px" height="150px" alt="">
            </div>
            <div class="loai hieuung">
                <ul>
                    <li><a href="?act=adddm">Danh Mục</a></li>
                    <li><a href="?act=addsp">Sản Phẩm</a></li>
                    <li><a href="?act=taikhoan">Tài Khoản</a></li>
                    <li><a href="?act=dsbl">Bình Luận</a></li>
                    <li><a href="?act=donhang">Đơn Hàng</a></li>
                    <li><a href="index.php?act=thongke">Thống Kê</a></li>
                    <li><a href="../index.php">Quay về Trang Chủ</a></li>
                </ul>
            </div>
        </div>
        <div class="boxphai">
            <div class="tieudeb">
                <h2>Thêm Danh Mục</h2>
            </div>
            <div class="bang">
                <form name="myForm" action="?act=adddm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="maloai">
                        Mã Loại<br>
                        <input type="text" name="maloai" disabled>
                    </div>
                    <div class="maloai">
                        Hình<br>
                        <input type="file" name="hinh">
                    </div>
                    <div class="maloai">
                        Tên Loại<br>
                        <input type="text" name="tenloai">
                    </div>
                    <div class="nut">
                        <input type="submit" name="themmoi" value="Thêm Mới">
                        <a href="?act=listdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script>
    function validateForm() {
        var tenloai = document.forms["myForm"]["tenloai"].value;
        var hinh = document.forms["myForm"]["hinh"].value;
        if (tenloai == "") {
            alert("Vui lòng nhập tên loại");
            return false;
        }
        if (hinh == "") {
            alert("Vui lòng thêm ảnh loại hàng");
            return false;
        }
    }
    </script>
</body>
</html>
