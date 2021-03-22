@extends('layouts.app')

@section('content')
<div class="container">
<div class="justify-content-center">
<div class="card col-md-10">


<div class="card-header justify-content-center">Procedencia de pilones</div>
<div class="card-body justify-content-center">

<form @isset($procedencia)
method="post" action="{{route('procedencia.update', ['procedencias'=>$procedencia->id])}}"
@else
method="post" action="{{route('procedencia.store')}}" role="form"
@endisset>

@csrf
<label for="">Ingrese un nombre</label>
<br>
<input class="col-md-6" type="text" name="nombre"
@isset($procedencia)
value="{{$procedencia->nombre}}"
@endisset class="col-md-6" type="text" name="nombre" value="{{ old ('nombre') }}"
>
@if ($errors->has('nombre'))
<p style="color:red;">{{$errors->first('nombre')}}</p>
@endif
<br>

<label for="">Ingrese una descripcion</label>
<br>
<input class="col-md-6 " type="text" name="descripcion"
@isset($procedencia)
value="{{$procedencia->descripcion}}"
@endisset class="col-md-6" type="text" name="descripcion" value="{{ old ('descripcion') }}">
<br>
@if ($errors->has('descripcion'))
<p style="color:red;">{{$errors->first('descripcion')}}</p>
@endif
<br>
<button type="submit" class="btn btn-primary">@if(isset($procedencia))Editar @else Guardar @endif</button> 

</form>

</div>


</div>

</div>

</div>
</div>
@endsection