@extends('layouts.app')
@section('content')
<div class= "container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Ubicación</h4> 
<div class="row">
<form action="">
<label for="" class="offset-md-7">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="codigo_ubicacion" selected >Codigo</option>
        <option value="descripcion_ubicacion">Descripcion</option>
        <option value="estado_ubicacion">Estado</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control offset-md-1" />
	  </form>
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Descripcion</th>
			<th>Estado</th>
			<th>Pilon</th>
            <th class="rojo">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ubicacion as $pro) 
			<tr>
				<td><a href="{{route('ubicacion.show', [$pro->codigo_ubicacion])}}">{{$pro->codigo_ubicacion}}</a></td>
				<td>{{$pro->descripcion_ubicacion}}</td>
				<td>{{$pro->estado_ubicacion == 1 ? "Disponible" :  "Ocupado"}}</td>
				<td></td>
                <td><form method="post" action="{{route('ubicacion.destroy', [$pro->codigo_ubicacion])}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form></td>
				</td>
					
			</tr>



			@endforeach
		</tbody>
	</table>
	{{ $ubicacion->links() }}
    <div class="btn-whatsapp">
<a href="{{route('ubicacion')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
    @endsection