@extends('layouts.app')

@section('content')
<div class="Container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Pilon</h4>
<div class="row">
<label for="" class="offset-md-7">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="checkbox_name">
        <option selected >Codigo</option>
        <option>Descripcion</option>
      </select>
	  </div>
	  <div>
	  <input type="search" id="form1" class="form-control offset-md-1" />
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Descripcion</th>
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
				<td><a href="{{route('pilon.show', [$pilon->codigo_pilon])}}"> {{$pilon->codigo_pilon}}</a></td>
				<td>{{$pilon->descripcion_pilon}}</td>
				<td>{{$pilon->Fecha_datos_pilones}}</td>
				<td>{{$pilon->ubicacion}}</td>
				<td>{{$pilon->sucursal_id}}</td>
                <td> <form method="post" action="{{route('pilon.destroy', [$pilon->codigo_pilon])}}">
                    {{csrf_field()}}
					{{method_field('DELETE')}}
                   
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                    </td>
					<td><button class="btn btn-primary" href="{{route('calendario')}}">Ver Calendario</button></td>
					<td><button class="btn btn-primary" href="{{route('reporte.show')}}">PDF</button></td>
                
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