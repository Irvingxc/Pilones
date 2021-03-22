@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
<div class="container">
<h4 class="text-center text-muted font-weight-bold">Pilon</h4>
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control" name="filtro">
        <option value="codigo_pilon" selected >Codigo</option>
        <option value="ubicacions.codigo_ubicacion">Ubicacion</option>
      </select>
	  </div>
	  <div>
	  <select id="inputState" class="form-control" name="filtro1">
	  @foreach($procedencias as $pro)
        <option value="{{$pro->nombre}}" selected >{{$pro->nombre}}</option>
		@endforeach
      </select>
	  </div>
	  <div>
	  <input type="search" id="form1" name="busqueda" class="form-control" />
	  </div>
	  </form>
	  </div>
	  @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Fecha Inicio</th>
			<th>Fecha de Empilonamiento</th>
			<th>Días Totales Desde Que Inició</th>
			<th>Días Totales Desde Empilonamiento</th>
			<th>Peso del Pilon</th>
			<th>Ubicación del Pilon</th>
			<th>Sucursal</th>
			<th>Reporte</th>
			
			</tr>
		</thead>
		<tbody>
			@foreach($pilon as $pilon) 
			<tr>
				<td><a href="{{route('pilon.show', [$pilon->id])}}"> {{$pilon->codigo_pilon}}</a></td>
				<td>{{$pilon->Fecha_datos_pilones}}</td>
				<td>{{$pilon->Fecha_empilonamiento}}</td>
				<td>{{$pilon->rer}} Días</td>
				<td>{{$pilon->empilonamiento}} Días</td>
				<td>{{$pilon->peso}}</td>
				<td>{{$pilon->cod}}</td>
				<td>{{$pilon->nombre}}</td>
					<td> <a class="btn btn-primary"  href="{{route('calendario', [$pilon->id])}}" >Calendario</button></td>
                
                </tr>
				

			@endforeach
		</tbody>
	</table>
	@endif
</div>
@endif
@endsection