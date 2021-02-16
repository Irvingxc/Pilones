@extends('layouts.app')

@section('content')
    <h4 class="text-center text-muted font-weight-bold">Menu</h4>
  </div>
  <div class="row">
  <div class="text-center col-6 pt-5  tintar">
      <a href="{{route('pilon.index')}}">
        <h4>Pilones</h4>
      </div>
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('procedencia.index')}}">
         <h4>Procendecia</h4>
      </div>
      <div class="text-center col-6 pt-5   tintar">
      <a href="{{route('variedad.index')}}">
        <h4>Variedad</h4>
      </div>    
      <div class="text-center col-6 pt-5 tintar">
      <a href="{{route('tipoclase.index')}}">
        <h4>Clases</h4>
      </div>
      <div class="text-center col-6 pt-5 tintar">
      <a href="{{route('ubicacion.index')}}">
        <h4>Ubicación</h4>
      </div>
  </div>
</div>



<!--=================================================================================================================================
<div class="container">
<div class="row justify-content-center">
<div class="card separacion">

  <div class="card-body">
    <h5 class="card-title">Procedencia</h5>
    <a href="" class="btn btn-primary">Entrar</a>
  </div>

</div> 
<div class="card separacion">


  <div class="card-body">
    <h5 class="card-title">Pilones</h5>
    <a href="" class="btn btn-primary">Entrar</a>
  </div>

</div> 

<div class="card separacion">


  <div class="card-body">
    <h5 class="card-title">Clases</h5>
    <a href="" class="btn btn-primary">Entrar</a>
  </div>

</div> 

<div class="card separacion">

<img class="card-img-top tamno" src="" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> Variedad</h5>
    <a href="" class="btn btn-primary">Entrar</a>
  </div>

</div> 



</div>

</div>

</div> -->
@endsection