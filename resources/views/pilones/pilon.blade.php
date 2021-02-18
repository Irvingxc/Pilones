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
<label for="">Ingrese el codigo</label>
<br>
<input class="col-md-12" type="text" name=codigo_pilon
@isset($pilon)
value="{{$pilon->codigo_pilon}}" readonly
@endisset>
</div>

<div class="margin">
<label for="">Fecha Inicio</label> 
<br>
<input class="col-md-12" type="date" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>

<div>
<label for="">Fecha de virado</label> 
<br>
<input class="col-md-12" type="date" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>
</div>
<br>
<br>

<div class="row justify-content-center">
<div class="">
<label for="" class="">Variedad</label>
</div>
<div>
<select id="inputState" class="offset-md-2 form-control" name="Variedad">
@foreach($variedad as $var)
        <option selected >{{$var->nombre_variedad}}</option>
        @endforeach
      </select>
      </div>


      <div class="margin">
<label for="" class="offset-md-11">Clase</label>
</div>
<div>
<select id="inputState" class="form-control offset-md-5" name="Variedad">
@foreach($clase as $clase)
        <option selected >{{$clase->nombre_clase}}</option>
        @endforeach
      </select>
      </div>
</div>

<br>



<div class="row justify-content-center">
<div class="">
<label for="" class="">Finca</label>
</div>
<div>
<select id="inputState" class="offset-md-5 form-control" name="Variedad">
@foreach($finca as $fin)
        <option selected >{{$fin->nombre_finca}}</option>
        @endforeach
      </select>
      </div>


      <div class="margin">
<label for="" class="offset-md-11">Ubicacion</label>
</div>
<div>
<select id="inputState" class="form-control offset-md-7" name="Variedad">
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
<textarea name="descripcion" id="" class="form-control" cols="70" rows="5"></textarea>
</div>
</div>



<br>
<br>
<button type='submit' class="btn btn-primary">@if(isset($pilon))Editar @else Guardar @endif</button>

</form>
</div>
</div>
</div>
</div>
@endsection