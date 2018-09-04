@extends('layouts.master')
@section('page-title', 'DASH BOARD - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DASH BOARD
                </div>
                <div id="linechart_material" style="margin: 30px;"></div>
                @if (Session::has('message'))
                    <div class="alert {{ Session::get('message-class') }}">{{ Session::get('message') }}</div>
                @endif
            </div>
        </section>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['line']});
        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url: '/api-get-chart-data',
                method: 'GET',
                success: function (resp) {
                    drawChart(resp);
                },
                error: function () {
                    swal('Something is wrong', 'Cannot retrieve data from API', 'error');
                }
            });
        });

        function drawChart(chart_data) {
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Revenue');
            for (var i = 0; i < chart_data.length; i++) {
                data.addRow([new Date(chart_data[i].day), Number(chart_data[i].revenue)]);
            }
            var options = {
                chart: {
                    title: 'Revenue chart over time',
                    subtitle: 'Currency(VND)'
                },
                height: 500,
                hAxis: {
                    format: 'dd/MM/yyyy'
                }
            };
            var chart = new google.charts.Line(document.getElementById('linechart_material'));
            chart.draw(data, google.charts.Line.convertOptions(options));
        }
    </script>
    
@endsection