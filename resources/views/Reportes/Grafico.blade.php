@extends('layouts.app')
@section('content')

<div id="container" style="width: 100%;height: 80vh">
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" value="{{ csrf_token() }}" name="_token">
<canvas id="myChart"></canvas>
	  
</div>
@endsection
@section('js')


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
window.addEventListener('load', function() {
    var ctx = document.getElementById('myChart').getContext('2d');

  /* var productos=[];
var valores=[];
$(document).ready(function(){
$.ajax({
    url:"{{ route('pilon.grafico') }}",
    method:'GET',
    data:{
        id:1,
        _token:$('input[name="_token"]').val() 
       
    }
}).done(function(res){
    var arreglo= JSON.parse(res)
    
    for(var x=0;x<arreglo.legth;x++){
        var todo='<tr><td>' +arreglo[x].id+'</td>';
        todo+='<td>' +arreglo[x].fecha_detalle+'</td>';
        todo+='<td>' +arreglo[x].temperatura+'</td>';
        todo+='<td>' +arreglo[x].virado+'</td>';
        todo+='<td>' +arreglo[x].mojado+'</td>';
        todo+='<td>' +arreglo[x].codigo_pilon+'</td>';
        todo+='<td>' +arreglo[x].pilon_id+'</td>';
        todo+='<td></td></tr>';
        $('#tbody').apped(todo);
        productos.push(arreglo[x].temperatura);
        valores.push(arreglo[x].fecha_detalle);

    }
});


}); */
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    //var user = <?php $temperatura; ?>;
    // The data for our dataset
    data: {
        labels: {!! json_encode($chart->labels)!!}, //['1','2','4','5','6','7','8','9','10'],
        datasets: [{
            label: 'Temperatura',
            backgroundColor: 'rgb(255,255,255,0.1)',
            borderColor: 'rgb(0, 0, 128)',
            data: {!! json_encode($chart->dataset)!!}, 
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

})
</script>
@endsection

