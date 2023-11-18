@extends('fragments')
@section('content')
    <div class="container">
        <div class="mx-5 pt-3" style="border: 1px solid">
            <h3 style="text-align: center;">
                Perfomance Statistics
            </h3>
            <div id="pie-chart" style="width: 600px; height: 400px; margin: auto;"></div>
        </div>
        
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

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
    </script>
@endsection