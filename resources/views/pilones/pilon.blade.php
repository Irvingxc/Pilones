@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
<div class="card-header">Pilon</div>
<div class="card-body ">
<form @isset($pilon)
method="post" action="{{route('pilon.update',['pilones'=>$pilon->codigo_pilon])}}"
 @else
  method="post" action="{{route('pilon.store')}}"
@endisset>

@csrf
<div class="row justify-content-center">
<div class="margin">
<label for="">Codigo</label>
<br>
<input class="col-md-10 form-control" type="text" name=codigo_pilon
@isset($pilon)
value="{{$pilon->codigo_pilon}}" readonly
@endisset>
</div>

<div class="margin">
<label for="">Fecha Inicio</label> 
<br>
<input class="col-md-12 form-control" type="date" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>

<div class="margin">
<label for="">Fecha de virado</label> 
<br>
<input class="col-md-12 form-control" type="date" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>

<div class="margin">
<label for="" class="">Ubicacion</label>
<select id="inputState" class="form-control" name="Variedad">
@foreach($ubicacion as $ubi)
        <option selected >{{$ubi->codigo_ubicacion}}</option>
        @endforeach
      </select>
</div>
</div>
<br>

<div class="row justify-content-center">

<div class="margin">
<label for="">Descripcion</label>
<br>
<textarea name="descripcion" id="" class="form-control" cols="50" rows="2"></textarea>
</div>


</div>
<br>

<div class="row justify-content-center">
<h2>Contenido del Pilon</h2>
</div>
<br>

<div class="row justify-content-center">
<div class="margin">
<label for="" class="">Variedad</label>
<select id="inputState" class="form-control" name="Variedad">
@foreach($variedad as $var)
        <option selected >{{$var->nombre_variedad}}</option>
        @endforeach
      </select>
</div>

    <div class="margin">
<label for="" class="">Clase</label>


<select id="inputState" class="form-control" name="Variedad">
@foreach($clase as $clase)
        <option selected >{{$clase->nombre_clase}}</option>
        @endforeach
      </select>
      </div>


      <div class="margin">
<label for="" class="">Finca</label>

<select id="inputState" class="form-control" name="Variedad">
@foreach($finca as $fin)
        <option selected >{{$fin->nombre_finca}}</option>
        @endforeach
      </select>
      </div>

</div>

<br>
<button type='submit' class="btn btn-primary">@if(isset($pilon))Editar @else Agregar @endif</button>

</form>

<br>

<table border="solid" class="table">
<thead class="thead-dark">
			<tr>
			<th>Variedad</th>
			<th>Clase</th>
            <th>Finca</th>
			<th>Eliminar</th>
			
			</tr>
		</thead>
		<tbody>
		
			<tr>
				<td><a href=""></a></td>
				<td></td>
                <td> <form method="post" action="">
                    
                   
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
                    </td>
					<td><button class="btn btn-primary" href=""></button></td>
                </tr>
		

		</tbody>
	</table>


</div>
</div>
</div>
</div>
@endsection