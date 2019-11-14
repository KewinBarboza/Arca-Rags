@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <img src="./images/logo-grande.jpg" alt="logo" class="mx-auto d-block img-fluid mt-5">
            <form method="POST" action="{{ route('register') }}">@csrf
                <div class="form-group row d-flex justify-content-center mt-5">

                    <div class="col-md-6">
                        <input id="name" type="text" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-6">
                        <input id="email" placeholder="Correo" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-6">
                        <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-6">
                        <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-center mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn verde-s d-block rounded-0 text-white m-auto">
                            {{ __('Registrar Usuario') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
