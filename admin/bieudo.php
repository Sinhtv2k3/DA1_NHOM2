<div class="row">
<a style="text-decoration: none;"  href="?act=thongke"><strong style="color: black;">Quay về</strong></a>


<div id="piechart"></div>
  <?php 
  if(isset($listthongke)){?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Số lượng sản phẩm'],
        <?php 
        $tongdm=count($listthongke);
        $i=1;
    foreach ($listthongke as $thongke) {
      extract($thongke);
      if($i==$tongdm) $dauphay=""; else $dauphay=",";
      echo"['".$thongke['tendm']."',".$thongke['countsp']."]".$dauphay;
      $i+=1;
    }
        ?>
    ]);

      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Thống kê số lượng sản phẩm theo danh mục', 'width':1000, 'height':500};

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
    </script>
  <?php } else if(isset($listthongke_thang)){?>
    <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
        <script>
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Tháng');
                data.addColumn('number', 'SỐ LƯỢNG BÁN');

                data.addRows([
                    <?php
                        foreach ($listthongke_thang as $thongke) {
                            extract($thongke);
                            echo "['Tháng $month_of_year', $so_luong_ban],";
                        }
                    ?>
                ]);

                var options = {
                    title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG ĐƠN HÀNG ĐÃ BÁN THEO THÁNG',
                    backgroundColor: 'white',  // Màu nền
                    titleTextStyle: {
                        color: 'chocolate'  // Màu chữ của tiêu đề
                    },
                    legendTextStyle: {
                        color: 'chocolate'  // Màu chữ của chú giải
                    },
                    pieSliceTextStyle: {
                        color: 'chocolate'  // Màu chữ của từng phần trong biểu đồ tròn
                    }
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
      </div>
    <?php } else if(isset($listthongke_tuan)){?>
      <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
        <script>
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Tuần');
                data.addColumn('number', 'SỐ LƯỢNG BÁN');

                data.addRows([
                    <?php
                        foreach ($listthongke_tuan as $thongke) {
                            extract($thongke);
                            echo "['Tuần $week_of_year', $so_luong_ban],";
                        }
                    ?>
                ]);

                var options = {
                    title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG ĐƠN HÀNG ĐÃ BÁN THEO THÁNG',
                    backgroundColor: 'white',  // Màu nền
                    titleTextStyle: {
                        color: 'chocolate'  // Màu chữ của tiêu đề
                    },
                    legendTextStyle: {
                        color: 'chocolate'  // Màu chữ của chú giải
                    },
                    pieSliceTextStyle: {
                        color: 'chocolate'  // Màu chữ của từng phần trong biểu đồ tròn
                    }
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
      </div>
    <?php }
    else if(isset($listthongke_ngay)){?>
      <div id="myChart" style="width:100%;color: white;height:500px; align-items: center">
        <script>
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Ngày');
                data.addColumn('number', 'SỐ LƯỢNG BÁN');

                data.addRows([
                    <?php
                        foreach ($listthongke_ngay as $thongke) {
                            extract($thongke);
                            echo "['Ngày $day_of_month', $so_luong_ban],";
                        }
                    ?>
                ]);

                var options = {
                    title: 'BIỂU ĐỒ THỂ HIỆN SỐ LƯỢNG ĐƠN HÀNG ĐÃ BÁN THEO THÁNG',
                    backgroundColor: 'white',  // Màu nền
                    titleTextStyle: {
                        color: 'chocolate'  // Màu chữ của tiêu đề
                    },
                    legendTextStyle: {
                        color: 'chocolate'  // Màu chữ của chú giải
                    },
                    pieSliceTextStyle: {
                        color: 'chocolate'  // Màu chữ của từng phần trong biểu đồ tròn
                    }
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
      </div>
    <?php }?>
        <!-- <div class="type_thongke_donhang">
        <div class="type_list">
          <a style="text-decoration: none;" class="type" href="index.php?act=bieudo&type=day">Theo ngày</a>
        </div>

        <div class="type_list">
          <a style="text-decoration: none;" class="type" href="index.php?act=bieudo&type=week">Theo tuần</a>
        </div>

        <div class="type_list">
          <a style="text-decoration: none;" class="type" href="index.php?act=bieudo&type=month">Theo tháng</a>
        </div>
    </div> -->
    </div>
  </div>
</div>


