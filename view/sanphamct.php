
<head>
    <link rel="stylesheet" href="css/sanphamct.css">
</head>

<?php include "view/header.php"; ?>


<style> .soluong .sol {
    margin-right: 40px;
}

.soluong input[type="number"] {
    width: 60px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

/* Buy button */
form button[type="submit"] {
    
    padding: 10px;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 10px;
}

form button[type="submit"]:hover {
    background-color: #218838;
}
 </style>  

   

<div class="boxspct">

    <div class="spchitiet">
        <div class="trai">
            <!-- <strong>Sản phẩm chi tiết</strong> -->
            <div class="imgct">  
                <img src="<?php echo $img_path . $onesp['anh'];  ?>" height="330px" width="340px">
            </div>
            <div class="cm">
              
                <hr>
                
            </div>
        </div>


        <div class="phai">
            <div class="ten_sp">
                <strong> <?php echo $onesp['ten_sp']; ?> </strong>
                <hr>
            </div>
            <div class="boxtt">
                <div class="cttrai">
                    <div class="gia">
                         <span>Giá gốc:</span>
                        <p class="gia"><?php echo number_format($onesp['gia']);  ?> VND</p>
                      
                        <!-- <span>Chỉ còn:</span>
                        <br><br>
                        <strong>
                      
                     <div class="bangsize">

                        <div class="sizes"><strong>Độ tuổi</strong></div>
                        <div class="size">1t-3t </div>
                        <div class="size">1t-3t </div>
                        <div class="size">4t>6t</div>
                        <div class="size">7t-9t</div>
                        <div class="size">9t-11t</div>
                    </div> -->
                    <form method="post" action="?act=bill">
                        <div class="soluong">
                            <div class="sol">
                                <input type="number" min="1" name="sl" value="1"> <br>
                            </div>
                            <?php if (isset($_SESSION['checkus']) && ($_SESSION['checkus'])) : ?>

                                <input type="hidden" name="id_sp" value="<?php echo $onesp['id_sp'] ?>">
                                <input type="hidden" name="anh" value="<?php echo $onesp['anh'] ?>">
                                <input type="hidden" name="ten_sp" value="<?php echo $onesp['ten_sp'] ?>">
                                <input type="hidden" name="gia" value="<?php echo $onesp['gia'] ?>">
                                
                    
                            <?php endif; ?>
                            <button type="submit">Mua hàng</button> <br>
                        </div>
                    </from>
                        <span><?php echo $onesp['mo_ta'];  ?></span><br>
                </div>


                   
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#binhluan").load("view/binhluan/binhluan.php", {
                idpro: <?= $id ?>
            });
        });
    </script>
    <div class="spchitiet" id="binhluan">

    </div>



    <!-- <div style="display: block;" class="spchitiet">
        <div class="row tengoiy">
            <h3><strong>Sản Phẩm Liên Quan</strong></h3>
        </div>
        <div class="row boxcontent">

            <?php
            // foreach ($sp_cungloai as $sp_cungloai) {
            //     extract($sp_cungloai);
            //     $img = $img_path . $img;
            //     $linksp = "index.php?act=sanphamct&idsp=" . $id;
            //     echo ' <div class="boxspct">
            //     <a href="chitietsp.html">
            //             <img src="' . $img . '" alt="" width="90"; height="100  "; />
            //         </a>
            //     <a href="' . $linksp . '">' . $name . '</a>
            //     <hr>
            //     </div>';
            // }
            ?>

        </div>
    </div> -->

</div>
<?php include "view/footer.php"; ?>