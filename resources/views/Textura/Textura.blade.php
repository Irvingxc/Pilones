@extends('layouts.app')
@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
<div class= "container"> 
<div class= "justify-content-center">
<div class= "card col-md-10">
<div class="card-header justify-content-center">Textura del pilon</div>
<div class="card-body justify-content-center">


<form @isset($tipoclase) method="post" action="{{route('Textura.update', ['Textura'=>$Textura->codigo_textura])}}" 
 @else
 method="post" action="{{route('Textura.store')}}" role="form"
 @endisset>
@csrf
<label for="">Ingrese el codigo</label>
<br>
<input @isset($Textura)
value="{{$Textura->codigo_textura}}" readonly
@endisset class="col-md-6" type="text" name="codigo_textura" value="{{ old ('codigo_textura') }}"
>
@if ($errors->has('codigo_textura'))
<p style="color:red;">{{$errors->first('codigo_textura')}}</p>
@endif
<br>
<label for="">Ingrese el nombre</label>
<br>
<input @isset($Textura)
value="{{$Textura->nombre_textura}}"
@endisset class="col-md-6" type="text" name="nombre_textura" value="{{ old ('nombre_textura') }}"
>
@if ($errors->has('nombre_textura'))
<p style="color:red;">{{$errors->first('nombre_textura')}}</p>
@endif
<br>
<label for="">Ingrese observación</label>
<br>
<input @isset($tipoclase)
value="{{$Textura->descripcion_textura}}"
@endisset class="col-md-6" type="text" name="descripcion_textura" value="{{ old ('descripcion_textura') }}"
>
@if ($errors->has('descripcion_textura'))
<p style="color:red;">{{$errors->first('descripcion_textura')}}</p>
@endif
<br>
<br>
<button type="submit" class="btn btn-primary">@if(isset($tipoclase))Editar @else Guardar @endif</button>

</form>
</div>
</div> 
</div>
</div>
@endif
@endsection