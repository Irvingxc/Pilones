@extends('layouts.app')

@section('content')
<div class="container">
<h4 class="text-center text-muted font-weight-bold">Pilon</h4>
<div class="row">
<form action="">
<label for="" class="offset-md-7">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="codigo_pilon" selected >Codigo</option>
        <option value="ubicacions.codigo_ubicacion">Ubicacion</option>
      </select>
	  </div>
	  <div>
	  <input type="search" id="form1" name="busqueda" class="form-control offset-md-1" />
	  </div>
	  </form>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Fecha de Empilonamiento</th>
			<th>Fecha Inicio</th>
			<th>Ubicacion del Pilon</th>
			<th>Sucursal</th>
            <th>Eliminar</th>
			<th>Reporte</th>
			<th>Imprimir</th>
			
			</tr>
		</thead>
		<tbody>
			@foreach($pilon as $pilon) 
			<tr>
				<td><a href="{{route('pilon.show', [$pilon->id])}}"> {{$pilon->codigo_pilon}}</a></td>
				<td>{{$pilon->Fecha_empilonamiento}}</td>
				<td>{{$pilon->Fecha_datos_pilones}}</td>
				<td>{{$pilon->cod}}</td>
				<td>{{$pilon->nombre}}</td>
                <td> <form method="post" action="{{route('pilon.destroy', [$pilon->id])}}">
                    {{csrf_field()}}
					{{method_field('DELETE')}}
                   
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                    </td>
					<td> <a class="btn btn-primary"  href="{{route('calendario', [$pilon->id])}}" >Ver Calendario</button></td>
					<td><a href="{{route('reporte.show')}}" class="btn btn-primary" target="_blank">Reporte</a></td> 
                
                </tr>
				

			@endforeach
		</tbody>
	</table>
	<div class="btn-whatsapp">
<a href="{{route('pilon.pilonindex')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
</div>
@endsection