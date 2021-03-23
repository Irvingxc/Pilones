@extends('layouts.app')
@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Pilonero'))
<div class= "container">
<h1 class="text-center text-muted font-weight-bold">Ubicación</h1> 
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>

<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="codigo_ubicacion" selected >Codigo</option>
        <option value="descripcion_ubicacion">Observación</option>
        <option value="estado_ubicacion">Estado</option>
      </select>
	  </div>


	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control offset-md-1" />
	  </form>
	  </div>
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Observación</th>
			<th>Estado</th>
			<th>Sucursal</th>
            <th class="rojo">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ubicacion as $pro) 
			<tr>
				<td><a href="{{route('ubicacion.show', [$pro->id])}}">{{$pro->codigo_ubicacion}}</a></td>
				<td>{{$pro->descripcion_ubicacion}}</td>
				<td>{{$pro->estado_ubicacion == 1 ? "Disponible" :  "Ocupado"}}</td>
				
				<td>{{$pro->nombre}}</td>
				@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Pilonero'))
                <td><form method="post" action="{{route('ubicacion.destroy', [$pro->id])}}" class="formulario-eliminar">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form></td>
				@endif
					
			</tr>



			@endforeach
		</tbody>
	</table>
	
    <div class="btn-whatsapp">
<a href="{{route('ubicacion')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
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

	@if(session('Eliminar')== 'No.')
	<script>
	 Swal.fire(
      '¡Fallo!',
      'No se puede eliminar este dato, seguramente este dato esta siendo utilizado en otro sitio.',
      'warning'
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