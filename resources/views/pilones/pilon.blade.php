@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
<div class="card-header">Pilon</div>
<div class="card-body ">
<form @isset($pilon)
method="post" action="{{route('pilon.update',['pilones'=>$pilon->codigo_pilon])}}"
 @else
  method="post" action="{{route('pilon.store')}}"
@endisset>

@csrf
<div class="row justify-content-center">
<div class="margin">
<label for="">Ingrese el codigo</label>
<br>
<input class="col-md-12" type="text" name=codigo_pilon
@isset($pilon)
value="{{$pilon->codigo_pilon}}" readonly
@endisset>
</div>

<div class="margin">
<label for="">Fecha Inicio</label> 
<br>
<input class="col-md-12" type="date" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>

<div>
<label for="">Fecha de virado</label> 
<br>
<input class="col-md-12" type="date" name='descripcion_pilon'
@isset($pilon)
value="{{$pilon->descripcion_pilon}}"
@endisset>
</div>
</div>
<br>
<br>

<div class="row justify-content-center">
<div class="">
<label for="" class="">Variedad</label>
</div>
<div>
<select id="inputState" class="offset-md-1 form-control" name="Variedad">
        <option selected >Habano</option>
        <option>Connericu</option>
        <option >Otroxjalksdjakdja</option>
      </select>
      </div>


      <div class="margin">
<label for="" class="offset-md-3">Clase</label>
</div>
<div>
<select id="inputState" class="form-control offset-md-2" name="Variedad">
        <option selected >Habano</option>
        <option>Connericu</option>
        <option >Otro</option>
      </select>
      </div>
</div>

<br>



<div class="row justify-content-center">
<div class="">
<label for="" class="">Finca</label>
</div>
<div>
<select id="inputState" class="offset-md-1 form-control" name="Variedad">
        <option selected >Habano</option>
        <option>Connericu</option>
        <option >Otroxjalksdjakdja</option>
      </select>
      </div>


      <div class="margin">
<label for="" class="offset-md-3">Ubicacion</label>
</div>
<div>
<select id="inputState" class="form-control offset-md-2" name="Variedad">
        <option selected >Habano</option>
        <option>Connericu</option>
        <option >Otro</option>
      </select>
      </div>
</div>

<br>

<div class="row justify-content-center">
<div class="margin">
<label for="">Descripcion</label>
<br>
<textarea name="descripcion" id="" class="form-control" cols="70" rows="5"></textarea>
</div>
</div>



<br>
<br>
<button type='submit' class="btn btn-primary">@if(isset($pilon))Editar @else Guardar @endif</button>

</form>
</div>
</div>
</div>
</div>
@endsection