@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="{{ asset('images/logo-grande.jpg') }}" alt="logo" class="mx-auto d-block img-fluid mt-5">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row justify-content-center">
                    <div class="col-md-6 mt-5">
                        <input id="email" placeholder="Ingrese su correo" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 mt-5 justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn verde-s text-white rounded-0 ml-2">
                            {{ __('Enviar enlace de restablecimiento de contraseña') }}
                        </button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection
