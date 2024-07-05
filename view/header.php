<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css.css">

</head>

<body>

    <div class="row headerday">
        <div class="col-3">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <a href="index.php"><img src="./image/logovip.jpg" height="130px" width=" 130px" alt=""></a>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
        <div class="col-9">

            <div class=" hihih row">
                <div class="col-12"></div>
            </div>
            <div style="margin-top: 30px;" class="row">
                <div class="col-8">
                    <div class="input-group mb-3">
                        <form class="input-group mb-3" action="index.php?act=timkiem" method="post">
                            <input type="text" name="kyw" class="form-control" placeholder="Tìm kiếm . . . ." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button type="submit" name="timkiem" class="btn btn-outline-secondary" id="button-addon2">Tìm</button>
                        </form>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row">
                        <div class="col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <a style="text-decoration: none;" href="index.php?act=sanpham">Giỏ hàng</a>
                        </div>


                        <div class="col-6" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                                <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z" />
                            </svg>
                            <a style="text-decoration: none;" href="?act=lichsudonhang">Đơn Hàng</a>
                        </div>

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
                                    <a href="?act=edittk&idtk=<?php echo $_SESSION['checkus']['id'] ?>"><?php echo $_SESSION['checkus']['user'] ?></a>
                                    ||
                                    <a href="?act=logout">Log Out</a>
                                    <br>
                                    <a href="admin/index.php">Đăng Nhập Cho Admin</a>
                                <?php
                                } else {
                                ?>
                                    <a href="?act=edittk&idtk=<?php echo $_SESSION['checkus']['id'] ?>"><?php echo $_SESSION['checkus']['user'] ?></a>
                                    ||
                                    <a href="?act=logout">Log Out</a>
                                <?php } ?>

                            <?php
                            } else {
                            ?>
                                <a style="text-decoration: none;" href="?act=login">Tài Khoản</a>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>






    </div>