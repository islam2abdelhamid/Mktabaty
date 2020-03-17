@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if(session()->get('message'))
            <div class="col-xl-6 col-lg-8 alert alert-success">
                {{ session()->get('message') }}
            </div><br />
            @endif
            <div class="col-xl-10 col-lg-12">
                <div class="card card-chart">
                    <div class="card-header card-header-success">
                        {{-- <div class="ct-chart"> --}}

                            @if(gettype(json_decode($jsonData)) === "object")
                                <canvas id="myChart"></canvas>
                            @else
                                <h2>{{$jsonData}}</h2>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Weekly Profits</h4>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> updated 4 minutes ago
                        </div>
                    </div>
                </div>
            </div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
    let ctx = document.getElementById('myChart');
    let cData = JSON.parse(`<?php echo $jsonData; ?>`);
    console.log(cData);
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cData.weeks,
            datasets: [{
                label: 'Profits Per Week',
                data: cData.profits,
                borderWidth: 1,
                hoverBorderColor: '#0000ff',
                hoverBackgroundColor:'#000ff00',
                barThickness: 20,
                maxBarThickness: 30,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
