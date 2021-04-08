@extends('layouts.app')
@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Pilonero')||@Auth::user()->hasRole('Sub-Pilonero'))

<div id="" style="width: 100%;height: 80vh">
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" value="{{ csrf_token() }}" name="_token">
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Virado</div>
                                                @isset($virado)
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$virado->ot}}</div>
                                            @endisset
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">                                            
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Fumigado</div>
                                                @isset($fumigados)
                                                
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fumigados->ot2}}</div>
                                            @endisset
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mojado
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                @isset($mojados)
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$mojados->ot3}}</div>
                                                    @endisset
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>



<div style="overflow-x: scroll">
  <div class="chart-container" style="position: relative; height:470px;  width:2000px;">
    <canvas id="myChart"></canvas>
  </div>
</div>
	  
</div>
@endif
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
        },{
            label: 'virado',
            backgroundColor: 'rgb(255,255,255,0.1)',
            borderColor: 'rgb(0, 0, 128)',
            data: {!! json_encode($chart->vir)!!},

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
                display:true,
                text:'Temperaturas de Pilones'
        }
    }
});

})
</script>
@endsection

