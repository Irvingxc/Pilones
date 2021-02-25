@extends('layouts.app')
@section('content')
<div class="container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Roles</h4>
<div class="row">
<form action="">
<label for="" class="offset-md-7">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="id" selected >Codigo</option>
        <option value="name">Nombre</option>
        <option value="guard_name" >Guard_Nombre</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control offset-md-1" />
	  </form>
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Guard_Name</th>
            <th class="rojo">Eliminar</th>
			
			</tr>
		</thead>
		<tbody>
			
			<tr>
			@foreach($role as $role) 
				<td><a href="{{route('role.show', [$role->id])}}">{{$role->id}}</td>
				<td>{{$role->name}}</td>
				<td>{{$role->guard_name}}</td>

				<td> <form method="post" action="{{route('role.destroy', [$role->id])}}">
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
<a href="{{route('role')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>

</div>
@endsection