@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body"> 
                    <form @isset($register) method="post" action="{{route('verusuario.update', ['users'=>$register->id])}}" 
                    @else 
                     method="POST" action="{{ route('verusuario.store') }}"
                     @endisset>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input  @isset($register)
                                    value="{{$register->name}}" 
                                    @endisset id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direccion de correo electronico') }}</label>

                            <div class="col-md-6">
                                <input  @isset($register)
                                value="{{$register->email}}"
                                @endisset id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input  @isset($register)
                                value="{{$register->password}}" 
                                @endisset id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4">Seleccione la procedencia</label> 

                             <div class="col-md-6">
                                <select id="inputState" class="col-md-6 form-control" name="procedencia">
                                @foreach($procedencia as $var)
                                <option selected value="{{$var->id}}" >{{$var->nombre}}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4">Seleccione un rol</label> 

                             <div class="col-md-6">
                                <select id="inputState" class="col-md-6 form-control" name="roles">
                                @foreach($role as $var)
                                <option selected value="{{$var->name}}" >{{$var->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
