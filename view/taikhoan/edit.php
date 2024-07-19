<div style="margin-top: 100px;" class="container">
    <div class="vehome">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
        <a href="index.php">Quay Lại Trang Chủ</a>
    </div>


    <div class="row col-6">
        <h3 style="padding-left: 515px;">Cập Nhật Tài Khoản</h3>
        <div class="col-3"></div>
        <?php
            if (isset($_SESSION['checkus']) && (is_array($_SESSION['checkus']))) {
                # code...
                extract($_SESSION['checkus']);
            }
            ?>
        <div class="col-6">
           
            <form action="index.php?act=edittk" method="post">
                <div class="mb-1">
                    Email
                    <input type="email" name="email" value="<?= $email?>" class="form-control" >
                </div>
                <div class="mb-1">
                    Tài Khoản
                    <input type="text" name="user" value="<?= $user?>" class="form-control">
                </div>
                <div class="mb-1">
                    Địa chỉ
                    <input type="text" name="address"   class="form-control" value="<?= $address?>">
                </div>
                <div class="mb-1">
                    Số Điện Thoại
                    <input type="text" name="tel"  class="form-control" value="<?= $tel?>" >
                </div>  
                <div class="mb-3">
                    Mật khẩu
                    <input type="password" name="pass" class="form-control">
                </div>

                <input type="hidden" name="id" value="<?=$id?>">  
                <!-- <a style="float: right; text-decoration: none;" href="?act=login">Đăng Nhập</a> -->
                <!-- <a style="float: right; text-decoration: none;" href=""> &ensp;| &ensp;</a> -->
                <!-- <a style="float: right; text-decoration: none;" href="?act=dangky">Đăng Kí</a> -->
                <input type="submit" value="Cập Nhật"  onclick="return confirm('Xem kĩ lại 1 lần nữa chứ ?')" class="btn btn-primary" name="capnhat">

                
            </form>
            <h2 class="thongbaoloi">
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }

                ?>
            </h2>
        </div>
        
    </div>
    


</div>