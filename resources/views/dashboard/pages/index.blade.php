@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <div class="card card-chart">
                    <div class="card-header card-header-success">
                        {{-- <div class="ct-chart"> --}}
                            <canvas id="myChart"></canvas>
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
            labels: [cData.weeks],
            datasets: [{
                label: 'Profits Per Week',
                data: [cData.profits],  
                backgroundColor: [
                    // 'rgba(153, 102, 255, 0.2)'
                    // 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)'
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    // 'rgba(153, 102, 255, 1)',
                    // 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
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