<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Bán Hàng</title>
    <link rel="stylesheet" href="./css/css1.css">

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

        document.addEventListener('DOMContentLoaded', () => {
            const accountButton = document.getElementById('account-button');
            const accountDropdown = document.querySelector('.account-dropdown-content');

            accountButton.addEventListener('click', (event) => {
                event.stopPropagation(); // Ngăn chặn sự kiện click lan ra ngoài
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
                    <a href="view/giohang.php"><i class="fas fa-shopping-cart"></i> Giỏ Hàng</a>
                    <a href="#"><i class="fas fa-file-alt"></i> Đơn Hàng</a>
                    <div class="account-menu">
                    &emsp;&emsp; &emsp;&emsp; &ensp;
                        <div style=" width: 100%;" class="col-6" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>

                            <?php if (isset($_SESSION['checkus']) && ($_SESSION['checkus'])) {
                            ?>
                                <?php
                                if ($_SESSION['checkus']['role'] == 1) {
                                ?>
                                    <a href="?act=edittk&id_tk=<?php echo $_SESSION['checkus']['id_tk'] ?>"><?php echo $_SESSION['checkus']['email'] ?></a>
                                    <br>

                                    <a href="?act=logout">Log Out</a>
                                    <br>
                                    <a href="admin/index.php">Đăng Nhập Cho Admin</a>
                                <?php
                                } else {
                                ?>
                                    <a href="?act=edittk&id_tk=<?php echo $_SESSION['checkus']['id_tk'] ?>"><?php echo $_SESSION['checkus']['email'] ?></a>
                                    <br>
                                    <a href="?act=logout" height ="30">Log Out</a>
                                <?php } ?>

                            <?php
                            } else {
                            ?>
                             <button>  <a style="text-decoration: none;" href="?act=login">Tài Khoản</a> </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
    </header>
</body>
</html>
