<?php 
include "./view/menu.php";
?>

<div class="container">
    <div class="row allsp">
        <div class="col-4">
            
        <div style="border: 1px solid gray;text-align:center;border-radius:10px" class="test row">
        <h3 style="text-align: center;" >Danh Mục</h3>
        <a style="text-decoration: none; color: #000; padding-bottom: 10px;" href="?act=sanpham">Tất cả sản phẩm</a>
           <?php foreach($dsdm as $value):?>
            <p><a id="tendanhmuc" style="text-decoration: none;color:black" href="?act=sptheodanhmuc&iddm=<?php echo $value['id']?>"><?php echo $value['name']?></a></p>
            <?php endforeach;?>

            </div>

            <div style="border-radius: 10px;border:1px solid gray;margin-top:50px" class="row">
            <h3 style="text-align:center">Giỏ Hàng</h3>
                <?php include './view/giohang.php';?>
            </div>
        </div>
        <div class="col-8">


                <div class="row">
                    <?php foreach($dssp as $value):?>
                    <div class="col-3">
                    <div class="card">
                        <img src="./upload/<?php echo $value['img']?>" class="card-img-top" alt="Fissure in Sandstone" height="190px"/>
                        <div class="card-body">
                            <h5><?php echo $value['name'];?></h5>
                            <hr>
                             <p> <?php echo number_format($value['price'])?> VND</p>
                        <div class="row">
                            <div style="text-align: center;" class="col-6">
                                <button type="button" class="btn btn-warning"><a style="text-decoration: none;color:#fff" href="?act=sanphamct&idsp=<?php echo $value['id']?>">Xem</a></button>                  
                            </div>
                            <div style="text-align: center;" class="col-6">  
                                <button type="submit" class="btn btn-warning"><a style="text-decoration: none;color:#fff" href="?act=sanphamct&idsp=<?php echo $value['id']?>">Mua</a></button></div>
                            </div>
                        
                        </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                        
        </div>
    </div>
</div>