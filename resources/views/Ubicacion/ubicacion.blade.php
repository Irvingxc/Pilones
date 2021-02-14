@extends('layouts.app')
@section('content')
<div class= "container" id="app"> 
<div class= "justify-content-center">
<div class= "card col-md-10">
<div class="card-header justify-content-center">Ubicacion del pilon</div>
<div class="card-body justify-content-center">

<form @isset($ubicacion) method="post" action="{{route('ubicacion.update', ['ubicaciones'=>$ubicacion->codigo_ubicacion])}}" role="form" 
@else
method="post" action="{{route('ubicacion.store')}}" role="form"
 @endisset>
@csrf
<label for="">Ingrese el codigo</label>
<br>
<input class="col-md-6" type="text" name="Codigo_ubicacion"
@isset($ubicacion)
value="{{$ubicacion->codigo_ubicacion}}" readonly
@endisset>
<br>
<label for="">Ingrese una descripcion</label>
<br>
<input class="col-md-6" type="text" name="descripcion_ubicacion"
@isset($ubicacion)
value="{{$ubicacion->descripcion_ubicacion}}"
@endisset>
<br>
<label for="">Seleccione el estado</label> 
{{$almacen=null}}
<br>
<select id="inputState" class="form-control" name="checkbox_name"
@isset($ubicacion)
{{$almacen = $ubicacion->estado_ubicacion}}
@if($almacen==0)
{{$almacen="Ocupado"}}
@endif
@if($almacen==1)
{{$almacen = "Disponible"}}
@endif

@endisset>
@isset($almacen)
        @if($almacen=="Disponible")
        <option selected >{{$almacen}}</option>
        <option>Ocupado</option>
        @endif
        @if($almacen=="Ocupado")
        <option selected >{{$almacen}}</option>
        <option >Disponible</option>
        @endif
        @endisset

        @if($almacen==null)
        <option selected >Disponible</option>
        <option>Ocupado</option>
        @endif


      </select>
<br>
<br>

<button type="submit"> @if(isset($ubicacion))Editar @else Guardar @endif</button>

</form>
</div>
</div> 
</div>
</div>
@endsection



