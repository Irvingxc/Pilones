@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">

<div class="card separacion">

<img class="card-img-top tamno" src="{{asset('images/pilon.jpg')}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Pilones</h5>
    <a href="{{route('home.menu')}}" class="btn btn-primary">Entrar</a>
  </div>

</div> 

@if(@Auth::user()->hasRole('cliente'))

<div class="card offset-md-2">
<img class="card-img-top tamno" src="{{asset('images/molde.jpg')}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Moldes</h5>
    <a href="" class="btn btn-primary">Entrar</a>
  </div>
  
</div>
@endif


</div>
</div> 

@endsection