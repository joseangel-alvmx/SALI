@extends('tablar::auth.layout')

@section('content')
<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-1 mt-5">
                    <a href="" class="navbar-brand navbar-brand-autodark">
                        <img src="{{asset(config('tablar.auth_logo.img.path', 'assets/logo.svg'))}}" height="36"
                            alt=""></a>
                </div>
                <form class="card" method="POST" action="{{ route('password.request') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="card-body p-6">
                        <div class="card-title">@lang('Cambiar Contraseña')</div>

                        <p class="text-muted">
                            @lang('Ingresa tu correo Electrónico y tu nueva contraseña')</p>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">@lang('Correo Electrónico')</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                id="email" name="email" aria-describedby="emailHelp" placeholder="tucorreo@alvamex.com.mx"
                                value="{{ $email ?? old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">@lang('Contraseña')</label>
                            <input type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Ingresa tu contraseña" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password-confirm">@lang('Confirmación de contraseña')</label>
                            <input type="password"
                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                placeholder="Confirma tu contraseña" name="password_confirmation" id="password-confirm">
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        @if (Session::get('success'))
                            <span class="text-success">
                                <strong>{{ Session::get('success') }}</strong>
                            </span>
                        @endif
                        @if(Session::get('error'))
                            <span class="text-danger">
                                <strong>{{ Session::get('error') }}</strong>
                            </span>
                        @endif
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">@lang('Restablecer contraseña')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection