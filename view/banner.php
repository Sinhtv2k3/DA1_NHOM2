    <marquee style="margin-left:115px; " width="80%"  behavior="scroll"  bgcolor="#eaeffe" direction="">
        <strong style="font-size: 30px; color: black;">F-Shop thương hiệu di động số 1</strong>
    </marquee>
<div  class="row banner">
    <div class="banner_left">
        <img src="image/anh2.jpg" width="250px" height="400px" alt="">
    </div>
    <div class="slide">
        <img src="image/anh1.jpg" alt="" width="770px" height="400pc" id="anh">
    </div>
    <div class="banner_right">
        <img src="image/anh3.jpg" width="250px" height="400px" alt="">
    </div>
</div>
<script>
    var anh = ['image/anh1.jpg', 'image/anh2.jpg', 'image/anh4.jpg'];
    var i = 0;

    function onshow() {
        if (i > 2) i = 0;
        document.getElementById('anh').src = anh[i];
        i++;
    }

    function play() {
        id = setInterval(function(

        ) {
            onshow();
        }, 3000)
    }
    play();

    function stop() {
        clearInterval(id)
    }
</script>