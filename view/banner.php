<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Slide</title>
    <link rel="stylesheet" href="../css/trangchu.css">
</head>
<body>
    <marquee style="margin-left:115px; " width="80%" behavior="scroll" bgcolor="#eaeffe" direction="">
        <strong style="font-size: 30px; color: black;">F-Shop thương hiệu quần áo số 1</strong>
    </marquee>
    <div class="row banner">
       
        <div class="slide">
    
            <img src="upload/anh3.jpg/anh1.jpg/anh2.jpg" alt="" width="1300px" height="400px" id="slideImage">
        </div>
        
    </div>

    <script>
        var anh = ['upload/anh1.jpg', 'upload/anh3.jpg', 'upload/anh2.jpg'];
        var i = 0;
        var id;

        function onShow() {
            if (i >= anh.length) i = 0;
            document.getElementById('slideImage').src = anh[i];
            i++;
        }

        function play() {
            id = setInterval(onShow, 2000);
        }

        function stop() {
            clearInterval(id);
        }

        play(); // Bắt đầu chạy slide ngay khi trang được tải
    </script>
</body>
</html>
