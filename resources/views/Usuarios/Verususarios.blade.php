@extends('layouts.app')
@section('content')
<div class="Container">
<h4 class="text-center text-muted font-weight-bold">Usuarios</h4>
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control" name="filtro">
        <option value="users.name" selected >Nombre</option>
        <option value="users.email">Correo</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control " />
	  </div>
    </form>
    </div>


<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
            <th>Id</th>
			<th>Nombre</th>
			<th>Correo</th>
            <th>Contraseña</th>
            <th>Sucursal</th>
            <th>Rol</th>
			<th class="rojo">Eliminar</th>
			

			</tr>
		</thead>
		<tbody>
			@foreach($Usuarios as $verusuario) 
			<tr>
            <td><a href="{{route('verusuario.show', [$verusuario->sd])}}">{{$verusuario->sd}}</td>
            <td>{{$verusuario->name}}</td>
            <td>{{$verusuario->email}}</td>
            <td>{{$verusuario->password}}</td>
            <td>{{$verusuario->nombre}}</td>
            <td>{{$verusuario->rol}}</td>
				
                <td> <form method="post" action="{{route('verusuario.destroy', [$verusuario->email])}} " class="formulario-eliminar">
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
<a href="{{route('verusuario')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
</div>
</div>
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
	window.addEventListener('load', function() {


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
})

	</script>
	
@endsection