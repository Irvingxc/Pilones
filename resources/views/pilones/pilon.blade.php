@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Pilonero')||@Auth::user()->hasRole('Sub-Pilonero'))
<div class="container">
<div class="card">
@if(@Auth::user()->hasRole('Analista'))
<div class="card-header"><a href="{{route('pilon.gerentes')}}">Pilon</a></div>
@else
<div class="card-header"><a href="{{route('pilon.index')}}">Pilon</a></div>
@endif
<div class="card-body ">
<form @isset($pilon)
method="post" action="{{route('pilon.update',['pilones'=>$pilon->id])}}"
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
@endisset value="{{ old ('codigo_pilon') }}">
<br>
@if ($errors->has('codigo_pilon'))
<p style="color:red;">{{$errors->first('codigo_pilon')}}</p>
@endif
<br>
</div>

<input class="col-md-10 form-control" type="hidden" name=disponible
@isset($pilon)
value="{{$pilon->ubicacion}}" readonly
@endisset>


<div class="margin">
<label for="">Fecha Inicio</label> 
<br>
<input class="col-md-12 form-control" type="date" name='fecha_inicio'

@isset($pilon)
value="{{$pilon->Fecha_datos_pilones}}" @if($true==0) disabled @endif

@endisset value="{{ old ('fecha_inicio') }}">
</div>

<div class="margin">
<label for="">Fecha Empilonamiento</label> 
<br>
<input class="col-md-12 form-control" type="date" name='Fecha_empilonamiento'

@isset($pilon)
value="{{$pilon->Fecha_empilonamiento}}" @if($true==0) disabled @endif

@endisset value="{{ old ('Fecha_empilonamiento') }}">
@if ($errors->has('Fecha_empilonamiento'))
<p style="color:red;">{{$errors->first('Fecha_empilonamiento')}}</p>
@endif
<br>
</div>


<div class="margin">
<label for="" class="">Ubicación</label>
<select id="inputState" class="form-control" name="ubicacion" @if($true==0) disabled @endif>
@isset($pilon)
<option  selected value="{{$pilon->ubicacion}}">{{$pilon->ubiselect}}</option>
@endisset
@foreach($ubicacion as $ubi)
@isset($pilon)
@if($pilon->ubiselect !=  $ubi->codigo_ubicacion)
<option value="{{$ubi->id}}">{{$ubi->codigo_ubicacion}}</option>
@else
@endif
@else
<option value="{{$ubi->id}}">{{$ubi->codigo_ubicacion}}</option>

 @endisset
        @endforeach
      </select>
      
      <p style="color:red;">
      @if(Session::has('message'))
   {!! Session::get('message') !!}
   @endif 
   </p>
</div>
</div>
<br>

<div class="row justify-content-center">

<div class="margin">
<label for="">observación</label>
<br>
<textarea name="descripcion_pilon" id="" class="form-control" cols="50" rows="2" @if($true==0) disabled @endif
 >@isset($pilon)
{{$pilon->descripcion_pilon}}
@endisset</textarea>
@if ($errors->has('descripcion_pilon'))
<p style="color:red;">{{$errors->first('descripcion_pilon')}}</p>
@endif
</div>
<input name="sucursal" value="{{Auth::user()->sucursal}}" type="hidden">

</div>

<br>
<button type='submit' class="btn btn-primary" @if($true==0) disabled @endif>@if(isset($pilon))Editar Pilon @else Guardar Pilon @endif</button>
<br>
<br>

<div class="row justify-content-center">
<h2>Contenido del Pilon</h2>
</div>

<pilon :rows="{{json_encode($clase)}}" :varie="{{json_encode($variedad)}}"
:fin="{{json_encode($finca)}}" :true="{{json_encode($true)}}" :mostrar="{{json_encode($mostrar)}}" :textura="{{json_encode($textura)}}"></pilon>
<br>


</form>

<br>


</div>
</div>
</div>
@endif
@endsection