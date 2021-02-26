@extends('layouts.app')
@section('content')
<div class="container">
<table border="solid" class="table">
<h4 class="text-center text-muted font-weight-bold">Fincas</h4>
<div class="row"> 
<form action=""> 
<label for="" class="offset-md-7">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control offset-md-1" name="filtro">
        <option value="codigo_finca" selected >Codigo</option>
        <option value="nombre_finca">Nombre</option>
        <option value="descripcion_finca" >Descripcion</option>
      </select>
	  </div>
	  <div>
	  <input type="search" name="busqueda" id="form1" class="form-control offset-md-1" />
	  </div>
	  </form>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
            <th class="rojo">Eliminar</th>
			
			</tr>
		</thead>
		<tbody>
			
			<tr>
			@foreach($Finca as $fincas) 
				<td><a href="{{route('fincas.show', [$fincas->codigo_finca])}}">{{$fincas->codigo_finca}}</td>
				<td>{{$fincas->nombre_finca}}</td>
				<td>{{$fincas->descripcion_finca}}</td>

				<td> <form method="post" action="{{route('fincas.destroy', [$fincas->codigo_finca])}}" class="formulario-eliminar">
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