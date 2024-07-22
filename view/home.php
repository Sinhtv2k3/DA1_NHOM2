<main>
    <section id="featured-products">
        <div class="container">
            <h2>Sản Phẩm Nổi Bật</h2>
            <div class="products">
                <!-- Thêm thẻ sản phẩm vào đây -->
            </div>
        </div>
    </section>

    <section id="all-products">
        <div class="container">
            <h2>Tất Cả Sản Phẩm</h2>
            <div class="products">
                <?php
                foreach ($spnew as $sp) {
                    $id = $sp['id_sp']; 
                    $ten_sp = $sp['ten_sp'];
                    $gia = $sp['gia'];
                    $anh = $img_path . $sp['anh'];
                    
                    echo '<div class="product-card">
                    <img src="' . $anh . '" style="width: 250px; height: 300px;">
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
