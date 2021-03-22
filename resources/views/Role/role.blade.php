@extends('layouts.app')

@section('content')
@if(@Auth::user()->hasRole('Admin'))
<div class="container">
<div class="justify-content-center">
<div class="card col-md-10">


<div class="card-header justify-content-center">Roles</div>
<div class="card-body justify-content-center">

<form @isset($role)
 method="post" action="{{route('role.update', ['role'=>$role->id])}}"
@else
method="post" action="{{route('role.store')}}"
@endisset>

@csrf
<label for="">Ingrese el nombre</label>
<br>
<input @isset($role)
value="{{$role->name}}"
@endisset class="col-md-6" type="text" name='name' value="{{ old ('name') }}"
>
@if ($errors->has('name'))
<p style="color:red;">{{$errors->first('name')}}</p>
@endif
<br>
<br>
<button type='submit' class="btn btn-primary">@if(isset($role))Editar @else Guardar @endif</button>

</form>

</div>
</div>
</div>
</div>
</div>
@endif
@endsection