@extends('layouts.app')

@section('content')
<div class="container">
<h4 class="text-center text-muted font-weight-bold">Pilon</h4>
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control" name="filtro">
        <option value="codigo_pilon" selected >Codigo</option>
        <option value="ubicacions.codigo_ubicacion">Ubicacion</option>
        <option value="procedencias.nombre">Procedencias</option>
      </select>
	  </div>
	  <div>
	  <input type="search" id="form1" name="busqueda" class="form-control" />
	  </div>
	  </form>
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Fecha Inicio</th>
			<th>Fecha de Empilonamiento</th>
			<th>Días Totales Desde Que Inició</th>
			<th>Días Totales Desde Empilonamiento</th>
			<th>Ubicación del Pilon</th>
			<th>Sucursal</th>
            <th>Eliminar</th>
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
				<td>{{$pilon->cod}}</td>
				<td>{{$pilon->nombre}}</td>
                <td> <form method="post" action="{{route('pilon.destroy', [$pilon->id])}}">
                    {{csrf_field()}}
					{{method_field('DELETE')}}
                   
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                    </td>
					<td> <a class="btn btn-primary"  href="{{route('calendario', [$pilon->id])}}" >Calendario</button></td>
                
                </tr>
				

			@endforeach
		</tbody>
	</table>
</div>
@endsection