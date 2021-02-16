@extends('layouts.app')

@section('content')
<div class="Container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Fincas</h4>
<div class="row">
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
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
            <th>Editar</th>
			
			</tr>
		</thead>
		<tbody>
			
			<tr>
			@foreach($Finca as $fincas) 
				<td><a href="{{route('fincas.show', [$fincas->codigo_finca])}}">{{$fincas->codigo_finca}}</td>
				<td>{{$fincas->nombre_finca}}</td>
				<td>{{$fincas->descripcion_finca}}</td>

				<td> <form method="post" action="{{route('fincas.destroy', [$fincas->codigo_finca])}}">
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
<a href="{{route('fincas')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>

</div>
@endsection