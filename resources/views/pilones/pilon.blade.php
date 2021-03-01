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
<input class="col-md-12 form-control" type="date" name='fecha_inicio'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>

<div class="margin">
<label for="">Fecha de virado</label> 
<br>
<input class="col-md-12 form-control" type="date" name=''
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>

<div class="margin">
<label for="" class="">Ubicacion</label>
<select id="inputState" class="form-control" name="ubicacion">
@foreach($ubicacion as $ubi)
        <option selected value="{{$ubi->id}}">{{$ubi->codigo_ubicacion}}</option>
        @endforeach
      </select>
</div>
</div>
<br>

<div class="row justify-content-center">

<div class="margin">
<label for="">Descripcion</label>
<br>
<textarea name="descripcion_pilon" id="" class="form-control" cols="50" rows="2"></textarea>
</div>
<input name="sucursal" value="{{Auth::user()->sucursal}}" type="hidden">

</div>
<br>
<button type='submit' class="btn btn-primary">@if(isset($pilon))Editar Pilon @else Guardar Pilon @endif</button>
<br>
<br>

<div class="row justify-content-center">
<h2>Contenido del Pilon</h2>
</div>

<pilon :rows="{{json_encode($clase)}}" :varie="{{json_encode($variedad)}}"
:fin="{{json_encode($finca)}}" :true="{{json_encode($true)}}" :mostrar="{{json_encode($mostrar)}}"></pilon>
<br>


</form>

<br>


</div>
</div>
</div>
@endsection