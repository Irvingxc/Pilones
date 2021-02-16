<div class= "container"> 
@extends('layouts.app')
@section('content')
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Clases</h4>
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
            <th>Nombre</th>
			<th>Descripcion</th>
            <th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipoclase as $pro) 
			<tr>
				<td><a href="{{route('tipoclase.show', [$pro->codigo_clase])}}">{{$pro->codigo_clase}}</a></td>
                <td>{{$pro->nombre_clase}}</td>
				<td>{{$pro->descripcion_clase}}</td>
                <td><form method="post" action="{{route('tipoclase.destroy', [$pro->codigo_clase])}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form></td> 
				</td>
					
			</tr>



			@endforeach
		</tbody>
	</table>
    <div class="btn-whatsapp">
<a href="{{route('tipoclase')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
    @endsection