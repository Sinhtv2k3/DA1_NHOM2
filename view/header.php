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
                event.stopPropagation();
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
                <div class="col-2"><a href="index.php">Home</a></div>
                <div class="col-2"><a href="#">Sản Phẩm</a></div>
                <div class="col-2"><a href="#">Giới Thiệu</a></div>
                <div class="col-2"><a href="#">Liên Hệ</a></div>
                <div class="col-2"><a href="#">Xem Thêm</a></div>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
                    <div class="col-2"><a href="admin/index.php?act=listsp">Trang Admin</a></div>
                <?php endif; ?>
            </div>
            <div class="header-icons">
                <input type="search" placeholder="Tìm kiếm sản phẩm...">
                <a href="view/giohang.php"><i class="fas fa-shopping-cart"></i> Giỏ Hàng</a>
                <a href="view/donhang.php"><i class="fas fa-file-alt"></i> Đơn Hàng</a>
                <div class="account-menu">
                    <button id="account-button"><i class="fas fa-user"></i>
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo htmlspecialchars($_SESSION['user']['ten']); 
                        } else {
                            echo 'Tài Khoản';
                        }
                        ?>
                    </button>
                    <div class="account-dropdown-content">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="view/taikhoan/capnhaptk.php">Cập Nhật</a>
                            <a href="view/taikhoan/logout.php">Đăng Xuất</a>
                        <?php else: ?>
                            <a href="view/taikhoan/dangki.php">Đăng Ký</a>
                            <a href="view/taikhoan/dangnhap.php">Đăng Nhập</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</body>

</html>
