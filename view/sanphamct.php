<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <style>
        /* Đặt màu nền và canh chỉnh cho các phần tử */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .boxspct {
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .spchitiet {
            display: flex;
            flex-direction: row;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
            padding-left: 200px;
        }

        .trai {
            flex: 1;
        }

        .phai {
            flex: 1;
        }


        .imgct img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .ten_sp {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .gia {
            font-size: 20px;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        form button[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin-top: 10px;
        }

        form button[type="submit"]:hover {
            background-color: #218838;
        }

        .cm {
            margin-top: 20px;
        }

        .cm hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .spchitiet span {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include "view/header.php"; ?>

    <div class="boxspct">
        <div class="spchitiet">
            <div class="trai">
                <div class="imgct">
                    <img src="<?php echo $img_path . $onesp['anh']; ?>" alt="Product Image">
                </div>
            </div>

            <div class="phai">
                <div class="ten_sp">
                    <strong><?php echo $onesp['ten_sp']; ?></strong>
                </div>
                <div class="gia">
                    <span>Giá sản phẩm:</span>
                    <p><?php echo number_format($onesp['gia']); ?> VND</p>
                </div>
                <div class="cm">
                    <span>Mô tả sản phẩm:</span><br>
                    <span><?php echo $onesp['mo_ta']; ?></span>
                </div>
                <form action="index.php?act=addToCart" method="POST">
                    <input type="hidden" name="id_sp" value="<?php echo $onesp['id_sp'] ?>">
                    <input type="hidden" name="anh" value="<?php echo $onesp['anh'] ?>">
                    <input type="hidden" name="ten_sp" value="<?php echo $onesp['ten_sp'] ?>">
                    <input type="hidden" name="gia" value="<?php echo $onesp['gia'] ?>">
                    <button type="submit" name="addToCart" value="1">Thêm vào Giỏ</button>
                </form>
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
        <div class="spchitiet" id="binhluan"></div>
    </div>

    <?php include "view/footer.php"; ?>
</body>

</html>