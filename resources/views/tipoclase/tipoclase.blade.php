@extends('layouts.app')
@section('content')
<div class= "container"> 
<div class= "justify-content-center">
<div class= "card col-md-10">
<div class="card-header justify-content-center">Clase del pilon</div>
<div class="card-body justify-content-center">


<form @isset($tipoclase) method="post" action="{{route('tipoclase.update', ['tipoclases'=>$tipoclase->codigo_clase])}}" 
 @else
 method="post" action="{{route('tipoclase.store')}}" role="form"
 @endisset>
@csrf
<label for="">Ingrese el codigo</label>
<br>
<input class="col-md-6" type="text" name="codigo_clase"
@isset($tipoclase)
value="{{$tipoclase->codigo_clase}}" readonly
@endisset>
<br>
<label for="">Ingrese el nombre</label>
<br>
<input class="col-md-6" type="text" name="nombre_clase"
@isset($tipoclase)
value="{{$tipoclase->nombre_clase}}"
@endisset>
<br>
<label for="">Ingrese una descripcion</label>
<br>
<input class="col-md-6" type="text" name="descripcion_clase"
@isset($tipoclase)
value="{{$tipoclase->descripcion_clase}}"
@endisset>
<br>
<br>
<button type="submit"> Guardar </button>

</form>
</div>
</div> 
</div>
</div>
@endsection