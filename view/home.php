<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="path_to_your_css_file.css"> <!-- Include your CSS file here -->
</head>

<body>
    <div class="container">

        <div class="tieude">
            <h2><strong>Danh Mục Sản Phẩm</strong></h2>
        </div>
        <div class="topdm">
            <!-- Replace this section with static HTML content for each category -->
            <div class="chitiet">
                <div class="anhdm">
                    <img src="path_to_image1.jpg" height="100px" width="100px" alt="Category Image">
                </div>
                <div class="tendm">
                    <a href="link_to_category1">Category Name 1</a>
                </div>
            </div>
            <div class="chitiet">
                <div class="anhdm">
                    <img src="path_to_image2.jpg" height="100px" width="100px" alt="Category Image">
                </div>
                <div class="tendm">
                    <a href="link_to_category2">Category Name 2</a>
                </div>
            </div>
            <!-- Repeat similar blocks for other categories -->
        </div>

        <div style="margin-top:50px" class="row top10sp">
            <div class="row">
                <h2 style="text-align:center;"><strong>Sản Phẩm Nổi Bật</strong></h2>
            </div>

            <div class="row top10sps ">
                <!-- Replace this section with static HTML content for each product -->
                <div class="col-3">
                    <div class="card">
                        <img src="path_to_product_image1.jpg" class="card-img-top" alt="Product Image" height="260px">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 1</h5>
                            <hr>
                            <h6>Product Price 1 VNĐ</h6>
                            <div style="text-align: center;">
                                <button type="button" class="btn btn-warning">
                                    <a style="text-decoration: none;color:#fff;" href="link_to_product1">Xem</a>
                                </button>
                                &emsp;&emsp;
                                <button type="submit" class="btn btn-warning">
                                    <a style="text-decoration: none;color:#fff" href="link_to_product1">Mua</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="path_to_product_image2.jpg" class="card-img-top" alt="Product Image" height="260px">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 2</h5>
                            <hr>
                            <h6>Product Price 2 VNĐ</h6>
                            <div style="text-align: center;">
                                <button type="button" class="btn btn-warning">
                                    <a style="text-decoration: none;color:#fff;" href="link_to_product2">Xem</a>
                                </button>
                                &emsp;&emsp;
                                <button type="submit" class="btn btn-warning">
                                    <a style="text-decoration: none;color:#fff" href="link_to_product2">Mua</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="post">
            <div class="tieudepost" style="padding: 10px;">
                <h2><strong>Bài Viết Đáng Chú Ý</strong></h2>
            </div>
            <div class="postall" style="display: flex;">
                <div class="baipost_1" style="margin-right: 200px; margin-left: 35px;">
                    <img src="path_to_post_image1.jpg" alt="Post Image 1" width="500px" height="400px">
                    <p><a href="link_to_post1">Bùng nổ cảm xúc cùng sự kiện Festival <br> F-Shop ra mắt điện thoại mới diễn ra tại Hà Nội</a></p>
                </div>
                <div class="baipost_2">
                    <img src="path_to_post_image2.jpg" alt="Post Image 2" width="500px" height="400px">
                    <p><a href="link_to_post2">Tại hội thảo, các chuyên gia trong lĩnh vực điện thoại thông minh<br> đã tổ chức các buổi hội thảo</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
