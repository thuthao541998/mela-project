@extends('layouts.master')
@section('page-title', 'DASH BOARD - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <section id="main-content">
        <section class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DASH BOARD
                </div>
                <div class="float-right mt-3">
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>

                </div>
                <div class="font-weight-bold ml-4 mt-3 text-uppercase">
                    Total Revenue : <span class="total-revenue"></span> (VND)
                </div>
                <div id="linechart_material" style="margin: 30px;"></div>
                <div id="piechart" style="width: 600px; height: 500px;"></div>
                @if (Session::has('message'))
                    <div class="alert {{ Session::get('message-class') }}">{{ Session::get('message') }}</div>
                @endif
            </div>
        </section>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['line']});
        google.charts.setOnLoadCallback(function () {
            var start = moment().subtract(29, 'days');
            var end = moment();
            $.ajax({
                url: '/api-get-chart-data?startDate='+start.format('YYYY-MM-DD')+'&endDate='+end.format('YYYY-MM-DD'),
                method: 'GET',
                success: function (resp) {
                    if(resp.length ==0){
                        swal('No data exists for line chart', 'Please choose another time range.', 'warning');
                        return;
                    };
                    drawChart(resp);
                    var totalRevenue = 0;
                    for(var i=0; i<resp.length ; i++){
                        totalRevenue += parseInt(resp[i].revenue);
                    };
                    $('.total-revenue').text(totalRevenue);
                    $('.total-revenue').formatNumber();

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
                    format: 'yyyy/MM/dd'
                }
            };
            var chart = new google.charts.Line(document.getElementById('linechart_material'));
            chart.draw(data, google.charts.Line.convertOptions(options));

            google.visualization.events.addListener(chart, 'select', selectHandler);
            console.log(chart_data);

            function selectHandler(e) {
                for(var i = 0; i < chart.getSelection().length; i++){
                    var item = chart.getSelection()[i];
                    window.location.href = '/admin/order?created_at=' + chart_data[item.row].day;
                }
            }
        }
        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();
            function cb(start, end) {
                $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last week': [moment().subtract(6, 'days'), moment()],
                    'Last 30 days': [moment().subtract(29, 'days'), moment()],
                    'This month': [moment().startOf('month'), moment().endOf('month')],
                    'Last month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                    "firstDay": 1

            }, cb);
            cb(start, end);
            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                //do something, like clearing an input
                $('#reportrange').val('');
            });
            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');
                $.ajax({
                    url: '/api-get-pie-chart-data?startDate='+startDate+'&endDate='+endDate,
                    method: 'GET',
                    success: function (resp) {
                        if(resp.length ==0){
                            swal('No data exists for pie chart', 'Please choose another time range.', 'warning');
                            return;
                        };
                        drawPieChart(resp);
                    },
                    error: function (r) {
                        swal('Something is wrong', 'Cannot retrieve data from API', 'error');
                    }
                });
                $.ajax({
                    url: '/api-get-chart-data?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        if(resp.length ==0){
                            swal('No data exists for line chart', 'Please choose another time range.', 'warning');
                            return;
                        };
                        drawChart(resp);
                        var totalRevenue = 0;
                        for(var i=0; i<resp.length ; i++){
                            totalRevenue += parseInt(resp[i].revenue);
                        };
                        $('.total-revenue').text(totalRevenue);
                        $('.total-revenue').formatNumber();
                    },
                    error: function () {
                        swal('Action failed', 'Cannot retrieve data from API', 'error');
                    }
                });
            });
        });
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(function () {
            var start = moment().subtract(29, 'days');
            var end = moment();
            $.ajax({
                url: '/api-get-pie-chart-data?startDate='+start.format('YYYY-MM-DD')+'&endDate='+end.format('YYYY-MM-DD'),
                method: 'GET',
                success: function (resp) {
                    if(resp.length ==0){
                        swal('No data exists for pie chart', 'Please choose another time range.', 'warning');
                        return;
                    };
                    // console.log(resp);
                    drawPieChart(resp);
                },
                error: function (r) {
                    console.log(r);
                    swal('Something is wrong', 'Cannot retrieve data from API', 'error');
                }
            });
        });

        function drawPieChart(chart_data) {
            var data = new google.visualization.DataTable();
            data.addColumn('string','Product Name');
            data.addColumn('number','Quantity');
            for(var i = 0;i < 5;i++){
                data.addRow([chart_data[i].product.name,Number(chart_data[i].totalQuantity)]);
            };
            var rest = 0;
            for(var i = 5;i < chart_data.length;i++){
                rest += Number(chart_data[i].totalQuantity);
            };
            data.addRow(['Other Products',rest]);
            var options = {
                title: '5 Best-sellers'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);

            google.visualization.events.addListener(chart, 'select', selectHandler);

            function selectHandler(e) {
                for(var i = 0; i < chart.getSelection().length; i++){
                    var item = chart.getSelection()[i];
                    window.location.href = '/admin/order?product_id=' + chart_data[item.row].product_id;
                }
            }
        }
    </script>
@endsection