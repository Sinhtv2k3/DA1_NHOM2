<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="../css/trangchu.css">
</head>
<body>
<?php include "menu.php"; ?>
<?php include "banner.php"; ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="css/trangchu.css">
</head>
<body>
    <header class="page_header">
        <!-- Header content here -->
    </header>

    <div class="container">
        <!-- Danh Mục Sản Phẩm -->
        <div class="danhmuctop10">
            <div class="tieude">
                <h2><strong>Danh Mục Sản Phẩm</strong></h2>
            </div>
            <div class="topdm">
                <div class="chitiet">
                    <div class="anh_dm">
                        <img src="path/to/default-image.jpg" alt="Danh Mục 1">
                    </div>
                    <div class="ten_dm">
                        <a href="#">Danh Mục 1</a>
                    </div>
                </div>
                <div class="chitiet">
                    <div class="anh_dm">
                        <img src="path/to/default-image.jpg" alt="Danh Mục 2">
                    </div>
                    <div class="ten_dm">
                        <a href="#">Danh Mục 2</a>
                    </div>
                </div>
                <!-- Thêm nhiều danh mục sản phẩm khác ở đây -->
            </div>
        </div>

        <!-- Sản Phẩm Nổi Bật -->
        <div class="top10sp">
            <div class="tieude">
                <h2><strong>Sản Phẩm Nổi Bật</strong></h2>
            </div>
            <div class="top10sps">
                <div class="card">
                    <img src="path/to/product-image.jpg" alt="Sản Phẩm 1">
                    <div class="card-body">
                        <h5 class="card-title">Sản Phẩm 1</h5>
                        <p class="card-price">Giá: 100,000 VNĐ</p>
                        <button class="btn-warning"><a href="#">Xem Chi Tiết</a></button>
                    </div>
                </div>
                <div class="card">
                    <img src="path/to/product-image.jpg" alt="Sản Phẩm 2">
                    <div class="card-body">
                        <h5 class="card-title">Sản Phẩm 2</h5>
                        <p class="card-price">Giá: 200,000 VNĐ</p>
                        <button class="btn-warning"><a href="#">Xem Chi Tiết</a></button>
                    </div>
                </div>
                <!-- Thêm nhiều sản phẩm nổi bật khác ở đây -->
            </div>
        </div>
    </div>

    <footer class="footer">
        <!-- Footer content here -->
    </footer>
</body>
</html>

<?php include "footer.php"; ?>
</body>
</html>
