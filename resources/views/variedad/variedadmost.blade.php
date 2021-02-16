	@extends('layouts.app')

@section('content')
<div class="Container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Variedad</h4>
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
            <th>Eliminar</th>
			
			</tr>
		</thead>
		<tbody>
			
			<tr>
			@foreach($variedad as $variedad) 
				<td><a href="{{route('variedad.show', [$variedad->codigo_variedad])}}">{{$variedad->codigo_variedad}}</td>
				<td>{{$variedad->nombre_variedad}}</td>
				<td>{{$variedad->descripcion_variedad}}</td>
              
			    <td> <form method="post" action="{{route('variedad.destroy', [$variedad->codigo_variedad])}}">
                    {{csrf_field()}}
					{{method_field('DELETE')}}
                   
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                    </td>
                </tr>

			@endforeach
		</tbody>
	</table>
	<div class="btn-whatsapp">
<a href="{{route('variedad')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
</div>
@endsection