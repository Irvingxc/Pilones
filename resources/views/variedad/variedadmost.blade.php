@extends('layouts.app')
@section('content')
<div class="container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Variedad</h4>
<div class="row">
<form action="">
<label for="" class="offset-md-7">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="checkbox_name">
        <option selected >Codigo</option>
        <option>Nombre</option>
        <option >Descripcion</option>
      </select>
	  </div>
	  <div>
	  <input type="search" id="form1" class="form-control offset-md-1" />
	  </form>
	  </div>
<table border="solid" class="table">
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