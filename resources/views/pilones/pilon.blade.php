@extends('layouts.app')

@section('content')
<div class="container">
<div class="justify-content-center">
<div class="card col-md-10">


<div class="card-header justify-content-center">Pilon</div>
<div class="card-body justify-content-center">

<form @isset($pilon)
method="post" action="{{route('pilon.update',['pilones'=>$pilon->codigo_pilon])}}"
 @else
  method="post" action="{{route('pilon.store')}}"
@endisset>

@csrf
<label for="">Ingrese el codigo</label>
<br>
<input class="col-md-6" type="text" name=codigo_pilon
@isset($pilon)
value="{{$pilon->codigo_pilon}}" readonly
@endisset>
<br>

<label for="">Ingrese la descripcion</label> 
<br>
<input class="col-md-6" type="text" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>

<br>
<button type='submit'>@if(isset($pilon))Editar @else Guardar @endif</button>

</form>

</div>
</div>
</div>
</div>
</div>
@endsection