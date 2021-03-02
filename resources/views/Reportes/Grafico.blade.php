@extends('layouts.app')
@section('content')

<div id="container" style="width: 100%;height: 80vh">
	  <canvas id="myChart"></canvas>
	  
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
        datasets: [{
            label: 'Marzo',
            backgroundColor: 'rgb(255,255,255,0.1)',
            borderColor: 'rgb(0, 0, 128)',
            data: [0, 60, 5, 90, 20, 30, 45,21,15,22,28,25]
        }]  
    },

    // Configuration options go here
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend:{
            position:'top'
        },
        title:{
                dislpay:true,
                text:'Chart.js Line chart'
        }
    }
});
</script>
@endsection

