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
    <style>
        /* CSS Tùy Chỉnh cho Nút Điều Hướng */
        .slick-prev, .slick-next {
            width: 40px; /* Chiều rộng của nút điều hướng */
            height: 40px; /* Chiều cao của nút điều hướng */
            background-color: rgba(0, 0, 0, 0.5); /* Màu nền của nút điều hướng */
            border-radius: 50%; /* Hình dạng nút điều hướng là hình tròn */
            color: #333; /* Màu chữ của nút điều hướng */
            z-index: 1; /* Đảm bảo các nút luôn ở trên cùng */
        }
        .product-slider {
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
        /* CSS cho phần danh mục và sản phẩm */
        #all-products {
            margin-top: 20px;
        }
        .product-card img {
            width: 250px;
            height: 300px;
        }
        /* CSS cho form lọc sản phẩm */
        #filter-form {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f8f8;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        #filter-form label {
            font-weight: bold;
            margin-right: 10px;
        }
        #filter-form select, #filter-form button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
        }
        #filter-form button {
            background-color: #144fe6;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        #filter-form button:hover {
            background-color: #0e3d8c;
        }
    </style>
</head>
<body>

<main>
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
                        <a href="'.$linksp.'"> <img src="'.$anh.'" alt="'.$ten_sp.'">
                            <h3><a href="'.$linksp.'">'.$ten_sp.'</a></h3>
                        </a>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Section lọc sản phẩm theo danh mục -->
    <section id="all-products">
        <div class="container">
            <h2>Tất Cả Sản Phẩm</h2>
            <form id="filter-form">
                <label for="category">Chọn danh mục:</label>
                <select id="category" name="category">
                    <option value="">Tất cả danh mục</option>
                    <?php
                    foreach ($listdanhmuc as $dm) {
                        if ($dm['trangthai'] == 0) {
                            echo '<option value="' . $dm['id_dm'] . '">' . $dm['ten_dm'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <button type="submit">Lọc</button>
            </form>
            <div id="product-list" class="products">
                <?php
                foreach ($spnew as $sp) {
                    $id = $sp['id_sp']; 
                    $ten_sp = $sp['ten_sp'];
                    $gia = $sp['gia'];
                    $anh = $img_path . $sp['anh'];
                    $linksp = "index.php?act=sanphamct&id_sp=".$id;
                    echo '<div class="product-card">
                        <a href="'.$linksp.'"><img src="' . $anh . '" alt="'.$ten_sp.'"></a>
                        <h3>' . $ten_sp . '</h3>
                        <p>' . $gia . ' VND</p>
                        <form action="index.php?act=addToCart" method="POST">
                            <input type="hidden" name="id_sp" value="' . $id . '">
                            <input type="hidden" name="ten_sp" value="' . $ten_sp . '">
                            <input type="hidden" name="anh" value="' . $anh . '">
                            <input type="hidden" name="gia" value="' . $gia . '">
                            <button type="submit" name="addToCart" value="1">Thêm vào Giỏ</button>
                        </form>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>
</main>

<!-- Script jQuery từ CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Slick Carousel từ CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- Script tùy chỉnh để khởi tạo Slick Carousel -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.product-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
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

        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            var category = $('#category').val();
            $.ajax({
                url: 'index.php?act=filterProducts',
                type: 'GET',
                data: { category: category },
                success: function(response) {
                    $('#product-list').html(response);
                }
            });
        });
    });
</script>

</body>
</html>
