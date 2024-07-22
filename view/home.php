<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Slider</title>
    <!-- Liên kết đến CSS của Slick Carousel từ CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <!-- Liên kết đến CSS tùy chỉnh của bạn -->
    <style>/* CSS Tùy Chỉnh cho Nút Điều Hướng */
.slick-prev, .slick-next {
    width: 40px; /* Chiều rộng của nút điều hướng */
    height: 40px; /* Chiều cao của nút điều hướng */
    background-color: rgba(0, 0, 0, 0.5); /* Màu nền của nút điều hướng */
    border-radius: 50%; /* Hình dạng nút điều hướng là hình tròn */
    color: #333; /* Màu chữ của nút điều hướng */
    z-index: 1; /* Đảm bảo các nút luôn ở trên cùng */
}
.product-slider{
 
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
    text-align: center; /* Căn giữa nội dung trong sản phẩm */
    padding: 10px;
}
.product-slider h3 a {
    font-weight: bold;
    text-decoration: none;
    font-size: 1.2em;
    margin-bottom: 5px;
    color: #000000dd;
}
.slick-prev {
    left: 10px; /* Khoảng cách từ lề trái của slider */
}

.slick-next {
    right: 10px; /* Khoảng cách từ lề phải của slider */
}

.slick-prev:before, .slick-next:before {
    font-size: 24px; /* Kích thước biểu tượng mũi tên */
    color: #144fe6; /* Màu của biểu tượng mũi tên */
}

/* Đảm bảo các mũi tên nằm ngang và ở giữa slider */
.slick-prev {
    top: 50%;
    transform: translateY(-50%);
}

.slick-next {
    top: 50%;
    transform: translateY(-50%);
}
</style>
</head>
<body>

    <!-- Nội dung trang của bạn -->
    <section id="featured-products">
        <div class="container">
            <h2>Sản Phẩm Nổi Bật</h2>
            <div class="product-slider">
                <?php
                    foreach ($sptop as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&id_sp=".$id_sp;
                        $anh = $img_path.$anh;
                        echo '<div class="product-card">
                            <img src="'.$anh.'" alt="" style="width: 250px; height: 300px;">
                            <h3><a href="'.$linksp.'">'.$ten_sp.'</a></h3>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Script jQuery từ CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Script Slick Carousel từ CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Script tùy chỉnh để khởi tạo Slick Carousel -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.product-slider').slick({
                slidesToShow: 4, // Số lượng slide hiển thị cùng lúc
                slidesToScroll: 1, // Số lượng slide cuộn mỗi lần
                dots: true, // Hiển thị các điểm điều hướng dưới slider
                arrows: true, // Hiển thị các mũi tên điều hướng
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>




    <section id="all-products">
        <div class="container">
        
            <h2>Tất Cả Sản Phẩm</h2>
           <div class="products">
            <?php 
            foreach ($spnew as $sp) {
                extract($sp);
                $hinh= $img_path.$anh;
                
                echo'<div class="product-card">
                    <img src="'.$hinh.'" alt="" style="width: 250px; height: 300px;">
                    <h3>'.$ten_sp.'</h3>
                    <p>'.$gia.'</p>
                    <button onclick="viewDetails(1)">Xem Chi Tiết</button>
                    <button onclick="addToCart(1)">Thêm vào Giỏ</button>
                </div>';
            }
            ?>
            <!-- <div class="products">
                 Thêm thẻ sản phẩm vào đây 
                <div class="product-card">
                    <img src="upload/anh1.jpg" alt="Sản phẩm 1" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 1</h3>
                    <p>100,000 VND</p>
                    <button onclick="viewDetails(1)">Xem Chi Tiết</button>
                    <button onclick="addToCart(1)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh2.jpg" alt="Sản phẩm 2" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 2</h3>
                    <p>250,000 VND</p>
                    <button onclick="viewDetails(2)">Xem Chi Tiết</button>
                    <button onclick="addToCart(2)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh3.jpg" alt="Sản phẩm 3" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 3</h3>
                    <p>300,000 VND</p>
                    <button onclick="viewDetails(3)">Xem Chi Tiết</button>
                    <button onclick="addToCart(3)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh4.jpg" alt="Sản phẩm 4" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 4</h3>
                    <p>400,000 VND</p>
                    <button onclick="viewDetails(4)">Xem Chi Tiết</button>
                    <button onclick="addToCart(4)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh1.jpg" alt="Sản phẩm 5" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 5</h3>
                    <p>500,000 VND</p>
                    <button onclick="viewDetails(5)">Xem Chi Tiết</button>
                    <button onclick="addToCart(5)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh1.jpg" alt="Sản phẩm 6" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 6</h3>
                    <p>600,000 VND</p>
                    <button onclick="viewDetails(6)">Xem Chi Tiết</button>
                    <button onclick="addToCart(6)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh1.jpg" alt="Sản phẩm 7" style="width: 250px; height: 300px;">
                    <h3>Sản phẩm 7</h3>
                    <p>700,000 VND</p>
                    <button onclick="viewDetails(7)">Xem Chi Tiết</button>
                    <button onclick="addToCart(7)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh1.jpg" alt="Sản phẩm 8" style="width: 200px; height: 300px;">
                    <h3>Sản phẩm 8</h3>
                    <p>800,000 VND</p>
                    <button onclick="viewDetails(8)">Xem Chi Tiết</button>
                    <button onclick="addToCart(8)">Thêm vào Giỏ</button>
                </div>
                <div class="product-card">
                    <img src="upload/anh1.jpg" alt="Sản phẩm 9" style="width: 200px; height: 300px;">
                    <h3>Sản phẩm 9</h3>
                    <p>900,000 VND</p>
                    <button onclick="viewDetails(9)">Xem Chi Tiết</button>
                    <button onclick="addToCart(9)">Thêm vào Giỏ</button>
                </div>-->
            </div>
        </div> 
    </section>
</main>
</body>
</html>
