@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Pilonero')||@Auth::user()->hasRole('Sub-Pilonero'))
<div class="container">
<h4 class="text-center text-muted font-weight-bold">Pilon</h4>
<form action="">
<div class="row">
<label for="" class="">Buscar por:</label>
<div class="">
<select id="inputState" class="form-control" name="filtro">
        <option value="codigo_pilon" selected >Codigo</option>
        <option value="ubicacions.codigo_ubicacion">Ubicación</option>
		<option value="contenido">Contenido del Pilon</option>
      </select>
	  </div>
	  <div>
	  <input type="search" id="form1" name="busqueda" class="form-control" />
	  </div>
	  </form>
	  </div>
<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Codigo</th>
			<th>Fecha Inicio</th>
			<th>Fecha de Empilonamiento</th>
			<th>Días Totales Desde Que Inició</th>
			<th>Días Totales Desde Empilonamiento</th>
			<th>Peso del Pilon</th>
			<th>Ubicación del Pilon</th>
			<th>Sucursal</th>
			@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Pilonero'))
            <th>Eliminar</th>
			@endif
			<th>Reporte</th>
			
			</tr>
		</thead>
		<tbody>
			@foreach($pilon as $pilon) 
			<tr>
				<td><a href="{{route('pilon.show', [$pilon->id])}}"> {{$pilon->codigo_pilon}}</a></td>
				<td>{{$pilon->Fecha_datos_pilones}}</td>
				<td>{{$pilon->Fecha_empilonamiento}}</td>
				<td>{{$pilon->rer}} Días</td>
				<td>{{$pilon->empilonamiento}} Días</td>
				<td>{{$pilon->peso}}</td>
				<td>{{$pilon->cod}}</td>
				<td>{{$pilon->nombre}}</td>
				@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Pilonero'))
                <td> <form method="post" action="{{route('pilon.destroy', [$pilon->id])}}" class="formulario-eliminar">
                    {{csrf_field()}}
					{{method_field('DELETE')}}
                   
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                    </td>
					@endif
					<td> <a class="btn btn-primary"  href="{{route('calendario', [$pilon->id])}}" >Calendario</button></td>
                
                </tr>
				

			@endforeach
		</tbody>
	</table>
	<div class="btn-whatsapp">
<a href="{{route('pilon.pilonindex')}}">
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
      '¡Fallo',
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
  title: '¿Está seguro que desea Elminar este Pilon?',
  text: "Se borrara todos los registros de temperaturas y de cantenidos del pilon",
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