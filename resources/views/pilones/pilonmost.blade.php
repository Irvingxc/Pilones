@extends('layouts.app')

@section('content')
<div class="Container">
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Descripcion</th>
            <th>Editar</th>
			
			</tr>
		</thead>
		<tbody>
			@foreach($pilon as $pilon) 
			<tr>
				<td><a href="{{route('pilon.show', [$pilon->codigo_pilon])}}"> {{$pilon->codigo_pilon}}</a></td>
				<td>{{$pilon->descripcion_pilon}}</td>
                <td> <form method="post" action="{{route('pilon.destroy', [$pilon->codigo_pilon])}}">
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
<a href="{{route('pilon.pilonindex')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
</div>
@endsection