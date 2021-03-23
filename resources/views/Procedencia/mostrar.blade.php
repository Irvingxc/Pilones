@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
<div class="container">
<h1 class="text-center text-muted font-weight-bold">Sucursal</h1> 
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>

<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="nombre" selected >Nombre</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control offset-md-1" />
	  </form>
	  </div>
	  </div>

<table border="solid" class="table">
<thead class="thead-dark" class="link-danger">
			<tr>
			
			<th>Nombre</th>
			<th>Observasción</th>
            <th class="rojo">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($procedencia as $pro) 
			<tr>
			
				<td><a href="{{route('procedencia.show', [$pro->id])}}"> {{$pro->nombre}} </a></td>
				<td>{{$pro->descripcion}}</td>
                <td>
				
				<form method="post" action="{{route('procedencias.destroy', [$pro->id])}}" class="formulario-eliminar">
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
<a href="{{route('procedencia')}}">
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