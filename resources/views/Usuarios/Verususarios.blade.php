@extends('layouts.app')

@section('content')
<div class="Container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Usuarios</h4>
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
            <th>Id</th>
			<th>Nombre</th>
			<th>Correo</th>
            <th>Contraseña</th>
			<th>Eliminar</th>
			

			</tr>
		</thead>
		<tbody>
			@foreach($Usuarios as $verusuario) 
			<tr>
            <td>{{$verusuario->id}}</td>
            <td>{{$verusuario->name}}</td>
            <td>{{$verusuario->email}}</td>
            <td>{{$verusuario->password}}</td>
				
                <td> <form method="post" action="{{route('verusuario.destroy', [$verusuario->email])}}">
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
<a href="{{route('verusuario')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
</div>
@endsection