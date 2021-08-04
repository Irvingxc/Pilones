@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
<div class="container">
<div class="justify-content-center">
<div class="card col-md-10">


<div class="card-header justify-content-center">Variedades</div>
<div class="card-body justify-content-center">

<form @isset($variedad)
 method="post" action="{{route('variedad.update', ['variedade'=>$variedad->codigo_variedad])}}"
@else
method="post" action="{{route('variedad.store')}}"
@endisset>

@csrf
<label for="">Ingrese el codigo</label>
<br>
<input @isset($variedad)
value="{{$variedad->codigo_variedad}}" readonly
@endisset class="col-md-6" type="text" name=codigo_variedad value="{{ old ('codigo_variedad') }}"
>
@if ($errors->has('codigo_variedad'))
<p style="color:red;">{{$errors->first('codigo_variedad')}}</p>
@endif
<br>
<label for="">Ingrese el nombre</label>
<br>
<input 
@isset($variedad)
value="{{$variedad->nombre_variedad}}"
@endisset class="col-md-6" type="text" name='nombre_variedad' value="{{ old ('nombre_variedad') }}"
>
@if ($errors->has('nombre_variedad'))
<p style="color:red;">{{$errors->first('nombre_variedad')}}</p>
@endif
<br>
<label for="">Ingrese observación</label
>
<br>
<input
@isset($variedad)
value="{{$variedad->descripcion_variedad}}"
@endisset class="col-md-6" type="text" name='descripcion_variedad' value="{{ old ('descripcion_variedad') }}"
>
@if ($errors->has('descripcion_variedad'))
<p style="color:red;">{{$errors->first('descripcion_variedad')}}</p>
@endif
<br>
<br>
<button type='submit' class="btn btn-primary">@if(isset($variedad))Editar @else Guardar @endif</button>

</form>

</div>
</div>
</div>
</div>
@endif
@endsection