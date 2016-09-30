@extends('layouts.admin')
@section('content')
    <h3>Dashboard</h3>
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="0" data-end="{{ $day->totalsForAllResults['ga:users'] }}" data-postfix="" data-duration="1500" data-delay="0">{{ $day->totalsForAllResults['ga:users'] }}</div>
                <h3>Visitantes hoje</h3>
            </div>
        </div>
        <div class="col-sm-4 col-xs-6">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="0" data-end="{{ $thisMonth->totalsForAllResults['ga:users'] }}" data-postfix="" data-duration="1500" data-delay="600">{{ $thisMonth->totalsForAllResults['ga:users'] }}</div>
                <h3>Visitantes este mês</h3>
            </div>
        </div>
        <div class="col-sm-4 col-xs-6">
            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="0" data-end="{{ $total->totalsForAllResults['ga:users'] }}" data-postfix="" data-duration="1500" data-delay="600">{{ $total->totalsForAllResults['ga:users'] }}</div>
                <h3>Total de visitantes</h3>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    <h3>Esta semana</h3>
    <canvas id="this_week_vs_last"></canvas>
    <div id="this_week_vs_last_legend" class="chart-legend"></div>
    <script type="text/javascript">
        var ctx = $("#this_week_vs_last").get(0).getContext("2d");
        var chartjsData = [];
        var json = {!! json_encode($analyticsData) !!};
        for (var i = 0; i <=6; i++) {
            if(i< json.length){
                chartjsData.push(json[i].pageViews);
            }else{
                chartjsData.push(0);
            }
        }
        var data = {
            labels: ["Seg", "Ter", "Qua", "Qui", "Sex", "Sab","Dom"],
            datasets: [
                {
                    label: "Visitantes",
                    fillColor: "rgba(13,172,222,.5)",
                    strokeColor: "rgba(13,172,222,1)",
                    pointColor: "rgba(13,172,222,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    data: chartjsData
                }
            ]
        };
        var chartInstance = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
            }
        });
    </script>

@endsection