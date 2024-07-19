<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Bán Hàng</title>
    <link rel="stylesheet" href="./css/css1.css">

    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Dữ liệu sản phẩm giả lập
            const products = [{
                    id: 1,
                    name: 'Sản phẩm 1 ',
                    price: '100,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 2,
                    name: 'Sản phẩm 2',
                    price: '200,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 3,
                    name: 'Sản phẩm 3',
                    price: '300,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 4,
                    name: 'Sản phẩm 4',
                    price: '400,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 5,
                    name: 'Sản phẩm 5',
                    price: '500,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 6,
                    name: 'Sản phẩm 6',
                    price: '600,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 7,
                    name: 'Sản phẩm 7',
                    price: '700,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 8,
                    name: 'Sản phẩm 8',
                    price: '800,000 VND',
                    image: 'upload/anh4.jpg'
                },
                {
                    id: 9,
                    name: 'Sản phẩm 9',
                    price: '900,000 VND',
                    image: 'upload/anh4.jpg'
                },
            ];

            // Tải sản phẩm vào trang
            const productsContainer = document.querySelector('#all-products .products');

            products.slice(0, 9).forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';

                productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>${product.price}</p>
            <button onclick="viewDetails(${product.id})">Xem Chi Tiết</button>
            <button onclick="addToCart(${product.id})">Thêm vào Giỏ</button>
        `;

                productsContainer.appendChild(productCard);
            });
        });

        function viewDetails(productId) {
            alert(`Xem chi tiết sản phẩm có ID: ${productId}`);
        }

        function addToCart(productId) {
            alert(`Thêm sản phẩm có ID: ${productId} vào giỏ hàng`);
        }



        document.addEventListener("DOMContentLoaded", function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll(".banner .slide");

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle("active", i === index);
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            setInterval(nextSlide, 3000);
        });

        document.addEventListener('DOMContentLoaded', () => {
            const accountButton = document.getElementById('account-button');
            const accountDropdown = document.querySelector('.account-dropdown-content');

            accountButton.addEventListener('click', () => {
                // Toggle hiển thị menu đăng nhập/đăng ký
                if (accountDropdown.style.display === 'block') {
                    accountDropdown.style.display = 'none';
                } else {
                    accountDropdown.style.display = 'block';
                }
            });

            // Ẩn menu tài khoản khi nhấp ra ngoài
            document.addEventListener('click', (event) => {
                if (!accountButton.contains(event.target) && !accountDropdown.contains(event.target)) {
                    accountDropdown.style.display = 'none';
                }
            });
        });
    </script> -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll(".banner .slide");

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle("active", i === index);
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            setInterval(nextSlide, 3000);
        });
    </script>
</head>

<body>
    <header>
        <div class="container">
            <div class="hh">
                <div class="row menudm">
                    <div class="col-1">
                        <a href="index.html"><img src="logo.png" alt="Logo"></a>
                    </div>
                    <div class="col-2"><a href="index.php">Home</a></div>
                    <div class="col-2"><a href="#">Sản Phẩm</a></div>
                    <div class="col-2"><a href="#">Giới Thiệu</a></div>
                    <div class="col-2"><a href="#">Liên Hệ</a></div>
                    <div class="col-2"><a href="#">Xem Thêm</a></div>
                </div>
                <div class="header-icons">
                    <input type="search" placeholder="Tìm kiếm sản phẩm...">
                    <a href="#"><i class="fas fa-shopping-cart"></i> Giỏ Hàng</a>
                    <a href="#"><i class="fas fa-file-alt"></i> Đơn Hàng</a>
                    <div class="account-menu">
                        <button id="account-button"><i class="fas fa-user"></i> Tài Khoản</button>
                        <div class="account-dropdown-content">
                            <a href="view/login/dangki.php">Đăng Ký</a>
                            <a href="view/login/login.php">Đăng Nhập</a>
                        </div>

                    </div>
                </div>
            </div>
    </header>