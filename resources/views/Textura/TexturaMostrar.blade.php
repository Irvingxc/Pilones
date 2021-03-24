<div class= "container"> 
@extends('layouts.app')
@section('content')
<h4 class="text-center text-muted font-weight-bold">Texturas</h4>
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="codigo_textura" selected >Codigo</option>
        <option value="nombre_textura">Nombre</option>
        <option value="descripcion_textura">Observación</option>
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
			<th>Codigo</th>
            <th>Nombre</th>
			<th>Observación</th>
            <th class="rojo">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Textura as $pro) 
			<tr>
				<td><a href="{{route('Textura.show', [$pro->codigo_textura])}}">{{$pro->codigo_textura}}</a></td>
                <td>{{$pro->nombre_textura}}</td>
				<td>{{$pro->descripcion_textura}}</td>
				@if(@Auth::user()->hasRole('Admin'))
                <td><form method="post" action="{{route('Textura.destroy', [$pro->codigo_textura])}}" class="formulario-eliminar">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form></td> 
				</td>
				@endif
					
			</tr>



			@endforeach
		</tbody>
	</table>
    <div class="btn-whatsapp">
<a href="{{route('Textura')}}">
<button class="btn btn-primary">Nuevo</button> 
</a>
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