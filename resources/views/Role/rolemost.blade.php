@extends('layouts.app')
@section('content')
@if(@Auth::user()->hasRole('Admin'))
<div class="container">
<h4 class="text-center text-muted font-weight-bold">Roles</h4>
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="id" selected >Codigo</option>
        <option value="name">Nombre</option>
        <option value="guard_name" >Guard_Nombre</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control offset-md-1" />
	  </div>
	  </div>
	  </form>
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

				<td> <form method="post" action="{{route('role.destroy', [$role->id])}} " class="formulario-eliminar">
                    {{csrf_field()}}
					{{method_field('DELETE')}}
                   
                    <button type="submit" class="btn btn-outline-danger  ">Eliminar</button>
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
@endif
@endsection

@section('js')
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	@if(session('Eliminar')== 'Ok.')
	<script>
	 Swal.fire(
      '¡Eliminado!',
      'El dato se eliminó con éxito.',
      'success'
    )
	</script>

	@endif


	<script>
	$('.formulario-eliminar').submit(function(e){
		e.preventDefault();

Swal.fire({
  title: '¿Está seguro?',
  text: "Este dato se eliminará definitivamente.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
 
	this.submit();
  }
})

	});

	</script>
	
@endsection