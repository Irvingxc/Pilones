@extends('layouts.app')

@section('content')
<div class="container">
<div class="justify-content-center">
<div class="card col-md-10">


<div class="card-header justify-content-center">Fincas</div>
<div class="card-body justify-content-center">

<form @isset($fincas)
 method="post" action="{{route('fincas.update', ['fincas'=>$fincas->codigo_finca])}}"
@else
method="post" action="{{route('fincas.store')}}"
@endisset>

@csrf
<label for="">Ingrese el codigo</label>
<br>
<input class="col-md-6" type="text" name=codigo_finca
@isset($fincas)
value="{{$fincas->codigo_finca}}"
@endisset
>
<br>

<label for="">Ingrese el nombre</label>
<br>
<input class="col-md-6" type="text" name='nombre_finca'
@isset($fincas)
value="{{$fincas->nombre_finca}}"
@endisset>
<br>
<label for="">Ingrese descripcion</label
@isset($fincas)
value="{{$fincas->nombre_finca}}"
@endisset>
<br>
<input class="col-md-6" type="text" name='descripcion_finca'
@isset($fincas)
value="{{$fincas->descripcion_finca}}"
@endisset
><br>
<br>
<button type='submit'> Guardar</button>

</form>

</div>
</div>
</div>
</div>
</div>
@endsection