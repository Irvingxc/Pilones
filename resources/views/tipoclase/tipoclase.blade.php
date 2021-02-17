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
<input @isset($tipoclase)
value="{{$tipoclase->codigo_clase}}" readonly
@endisset class="col-md-6" type="text" name="codigo_clase" value="{{ old ('codigo_clase') }}"
@if ($errors->has('codigo_clase'))
<p style="color:red;">{{$errors->first('codigo_clase')}}</p>
@endif>
<br>
<label for="">Ingrese el nombre</label>
<br>
<input @isset($tipoclase)
value="{{$tipoclase->nombre_clase}}"
@endisset class="col-md-6" type="text" name="nombre_clase" value="{{ old ('nombre_clase') }}"
@if ($errors->has('nombre_clase'))
<p style="color:red;">{{$errors->first('nombre_clase')}}</p>
@endif>
<br>
<label for="">Ingrese una descripcion</label>
<br>
<input @isset($tipoclase)
value="{{$tipoclase->descripcion_clase}}"
@endisset class="col-md-6" type="text" name="descripcion_clase" value="{{ old ('descripcion_clase') }}"
@if ($errors->has('descripcion_clase'))
<p style="color:red;">{{$errors->first('descripcion_clase')}}</p>
@endif>
<br>
<br>
<button type="submit">@if(isset($tipoclase))Editar @else Guardar @endif</button>

</form>
</div>
</div> 
</div>
</div>
@endsection