@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center text-muted font-weight-bold">Sucursal</h1> 
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>

<div class="">
<select id="inputState" class="form-control " name="filtro">
        <option value="nombre" selected >Nombre</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control " />
	  </form>
	  </div>
	  </div>

<table border="solid" class="table">
<thead class="thead-dark" class="link-danger">
			<tr>
			
			<th>Nombre</th>
			<th>Descripcion</th>
            <th class="rojo">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($procedencia as $pro) 
			<tr>
			
				<td><a href="{{route('procedencia.show', [$pro->id])}}"> {{$pro->nombre}} </a></td>
				<td>{{$pro->descripcion}}</td>
                <td><a class="btn btn-outline-danger" href="">Eliminar</a></td>
					
			</tr> 
			

			@endforeach
		</tbody>
		
	</table>
	<div class="btn-whatsapp">
<a href="{{route('procedencia')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>


</div>
@endsection