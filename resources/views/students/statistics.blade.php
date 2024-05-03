@extends('fragments')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> --}}
    <link type="text/javascript" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

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
                ['Xếp loại', 'Số lượng sinh viên theo xếp loại'],

                @php
                    foreach ($pieChart as $d) {
                        echo "['" . $d->rank . "', " . $d->count . '],';
                    }
                @endphp
            ]);

            var options = {
                title: 'Kết quả học tập của sinh viên',
                is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));

            chart.draw(data, options);
        }

        // Status bar chart
        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['Trạng thái', ''],

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
                    title: 'Số lượng', // Đặt tiêu đề cho trục dọc
                    titleTextStyle: { color: '#FF0000' }, // Đặt màu sắc cho tiêu đề trục dọc
                },
                hAxis: {
                    title: 'Trạng thái', // Đặt tiêu đề cho trục ngang
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