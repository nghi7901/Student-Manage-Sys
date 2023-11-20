@extends('fragments')
@section('content')
    <div class="container">
        <div class="mx-5 pt-3" style="border: 1px solid">
            <h3 style="text-align: center;">
                Thống kê kết quả học tập của sinh viên
            </h3>
            <div id="pie-chart" style="width: 600px; height: 400px; margin: auto;"></div>
        </div>
        <div class="m-5 py-3" style="border: 1px solid">
            <h3 style="text-align: center; margin-bottom: 30px">
                Thống kê trạng thái học tập của sinh viên
            </h3>
            <div id="bar-chart" style="width: 600px; height: 400px; margin: auto"></div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawPieChart);
        google.charts.setOnLoadCallback(drawBarChart);

        function drawPieChart() {

            var data = google.visualization.arrayToDataTable([
                ['Rank', 'Students Rank Count'],

                @php
                    foreach ($pieChart as $d) {
                        echo "['" . $d->rank . "', " . $d->count . '],';
                    }
                @endphp
            ]);

            var options = {
                title: 'Students Rank Performance',
                is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));

            chart.draw(data, options);
        }

        // Status bar chart
        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', ''],

                @php
                    foreach ($barChart as $b) {
                        echo "['" . $b->status->value . "', " . $b->count . '],';
                    }
                @endphp
            ]);
    
            var options = {
                // chart: {
                //     title: 'Students Status Overview',
                // },
                colors: ['#FFA500'],
                width: 500, 
                height: 400,
                vAxis: {
                    title: 'Total', // Đặt tiêu đề cho trục dọc
                    titleTextStyle: { color: '#FF0000' }, // Đặt màu sắc cho tiêu đề trục dọc
                },
                hAxis: {
                    title: 'Status', // Đặt tiêu đề cho trục ngang
                    titleTextStyle: { color: '#FF0000' }, // Đặt màu sắc cho tiêu đề trục ngang
                },
                legend: { position: 'none' }, // Ẩn hiển thị chú thích
                bar: { groupWidth: '50%' },
            };
    
            var chart = new google.charts.Bar(document.getElementById('bar-chart'));
    
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection