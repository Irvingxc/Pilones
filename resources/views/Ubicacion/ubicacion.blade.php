@extends('layouts.app')
@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Pilonero'))
<div class= "container" id="app"> 
<div class= "card col-md-10">
<div class="card-header justify-content-center">Ubicacion del pilon</div>
<div class="card-body justify-content-center">

<form @isset($ubicacion) method="post" action="{{route('ubicacion.update', ['ubicaciones'=>$ubicacion->codigo_ubicacion])}}" role="form" 
@else
method="post" action="{{route('ubicacion.store')}}" role="form"
 @endisset>
@csrf
<input name="procedencia" value="{{Auth::user()->sucursal}}" type="hidden">
<label for="">Ingrese el codigo</label>
<br>
<input
 @isset($ubicacion)
value="{{$ubicacion->codigo_ubicacion}}" readonly
@endisset class="col-md-6" type="text" name="Codigo_ubicacion" value="{{ old ('Codigo_ubicacion') }}"
>
@if ($errors->has('Codigo_ubicacion'))
<p style="color:red;">{{$errors->first('Codigo_ubicacion')}}</p>
@endif
<br>
<label for="">Ingrese observación</label>
<br>
<input
 @isset($ubicacion)
value="{{$ubicacion->descripcion_ubicacion}}"
@endisset class="col-md-6" type="text" name="descripcion_ubicacion" value="{{ old ('descripcion_ubicacion') }}"
>
@if ($errors->has('descripcion_ubicacion'))
<p style="color:red;">{{$errors->first('descripcion_ubicacion')}}</p>
@endif
<br>
<label for="">Seleccione el estado</label> 
{{$almacen=null}}
<br>
<select id="inputState" class="col-md-6" name="checkbox_name"
@isset($ubicacion) readonly
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
        @endif


      </select>
<br>


                       

                         
                        <br>
                        <br>

<button type="submit" class="btn btn-primary"> @if(isset($ubicacion))Editar @else Guardar @endif</button>

</form>
</div>
</div>
</div>
@endif
@endsection



