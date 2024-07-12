@extends('tablar::auth.layout')
@section('title', 'Login')
@section('content')
<div class=" m-3">
    <a href="" class="navbar-brand navbar-brand-autodark">
        <img src="{{asset(config('tablar.auth_logo.img.path', 'assets/logo.svg'))}}" height="65" alt=""></a>
</div>
<div class="w-75 py-4 d-flex flex-column justify-content-center mx-auto">
    <div class="m-3 login-title-container">
        <h1 class="login-title text-center">SALI</h1>
    </div>
    <div class="mx-auto w-35">
        <div class="card-body">
            <h2 class="mb-4 font-weight-bold">Inicio de sesión</h2>
            <form action="{{route('login')}}" method="post" autocomplete="off" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label">Usuario:</label>
                    <input type="text"
                        class="form-control form-control-rounded @error('nombre_usuario') is-invalid @enderror"
                        name="nombre_usuario" placeholder="tucorreo@alvamex.com.mx" autocomplete="off">
                    @error('nombre_usuario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Contraseña:
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="clave"
                            class="form-control form-control-rounded @error('clave') is-invalid @enderror"
                            placeholder="Ingresa tu contraseña" autocomplete="off">
                        @error('clave')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (Session::get('success'))
                    <span class="alert alert-success">
                        <strong>{{ Session::get('success') }}</strong>
                    </span>
                @endif
                <div class="form-footer mb-3">
                    <button type="submit" class="btn btn-entrar w-100">Entrar</button>
                </div>
                <span class="">
                    <a href="{{route('password.request')}}">Olvide mi contraseña</a>
                </span>
            </form>
        </div>
    </div>
</div>
@endsection