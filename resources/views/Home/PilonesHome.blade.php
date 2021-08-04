@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-center text-muted font-weight-bold">Menú Pilones</h4>

  <div class="row">
  @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
  <div class="text-center col-md-6 pt-5  tintar"> 
      <a href="{{route('pilon.gerentes')}}">
        <h1>Pilones Reportes</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Pilonero')||@Auth::user()->hasRole('Sub-Pilonero'))
  <div class="text-center col-md-6 pt-5  tintar">
      <a href="{{route('pilon.index')}}">
        <h1>Pilones</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))

      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('fincas.index')}}">
         <h1>Fincas</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
      <div class="text-center col-md-6 pt-5   tintar">
      <a href="{{route('variedad.index')}}">
        <h1>Variedad</h1>
      </div>
      @endif  
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Sub-Admin'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('tipoclase.index')}}">
        <h1>Clases</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista')||@Auth::user()->hasRole('Pilonero'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('ubicacion.index')}}">
        <h1>Ubicación</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('procedencia.index')}}">
        <h1>Sucursales</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('Textura.index')}}">
        <h1>Texturas</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin')||@Auth::user()->hasRole('Analista'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('verusuario.index')}}">
        <h1>Usuarios</h1>
      </div>
      @endif
      @if(@Auth::user()->hasRole('Admin'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{route('role.index')}}">
        <h1>Roles</h1>
      </div>
      @endif

      @if(@Auth::user()->hasRole('Admin'))
      <div class="text-center col-md-6 pt-5 tintar">
      <a href="{{asset('images/Manual.pdf')}}" target="_blank">
        <h1>Manual de Usuario</h1>
      </div>
      @endif
      
      
      
  </div>
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