<div class="px-5 py-3 font-semibold text-xl text-white bg-blue-600  w-max mx-auto mt-5 rounded-md">Xin chào <?= $_SESSION['user']['customer_name'] ?> đến với trang quản trị</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Lượng truy cập sản phẩm của khách hàng', 'Percentage'],
            <?php
            if (is_array($listViewTop)) {
            foreach ($listViewTop as $key => $value) {
                echo "[";
                echo "'";
                echo $value['product_name'];
                echo "'";
                echo ",";
                echo $value['product_view'];
                echo "]";
                if ($key != count($listViewTop) - 1) echo ",";
            }
        }
            ?>
        ]);

        var options = {
            width: 500,
            legend: {
                position: 'none'
            },

            bar: {
                groupWidth: "90%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
</script>

<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Lâm', 'Hours per Day'],
            <?php
            if (is_array($listCategory)) {
            foreach ($listCategory as $key => $value) {
                echo "[";
                echo "'";
                echo $value['category_name'];
                echo "'";
                echo ",";
                echo $value['quantity'];
                echo "]";
                if ($key != count($listCategory) - 1) echo ",";
            }
        }
            ?>

        ]);

        var options = {
            title: 'Biểu đồ cơ cấu danh mục',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
</script>
<div class="flex bg-white mt-10">
    <div id="top_x_div" style="width: max-content; height: 300px;margin: auto;margin-top:20px;padding: 10px"></div>
    <div id="donutchart" style="width: 700px; height: 300px; margin:0 auto;margin-top:20px;"></div>
</div>