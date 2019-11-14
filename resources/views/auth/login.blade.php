@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <img src="{{ asset('images/logo-grande.jpg') }}" alt="logo" class="mx-auto d-block img-fluid mt-5">
            <form method="POST" action="{{ route('login') }}">@csrf
                <div class="form-group row d-flex justify-content-center mt-5">
                    <div class="col-md-8">
                        <input id="email" type="email" placeholder="Correo" class="mb-3 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-8">
                        <input id="password" type="password" placeholder="Contraseña" class="mb-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <button type="submit" class="btn verde-s d-block rounded-0 text-white m-auto">
                                {{ __('Iniciar Sesión') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-check row mb-0 mt-5 d-flex justify-content-center">
                    <div class="col-md-8">
                        @if (Route::has('password.request'))
                            <a class="text-verde mb-2" href="{{ route('password.request') }}">
                                {{ __('Olvidó su contraseña') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
