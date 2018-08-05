@extends('layouts.app')
@section('content')
<div style="background-color: #EDECEC;">
    <div class="container mx-auto">
        <div class="row mx-auto" align="center">
            <div class="card card-body mx-auto col-md-6" style="margin: 20px;">
                <h3 class="card-title font-weight-bold">Iniciar Sesión</h3>
                @include('partials.flash')
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" placeholder="E-mail" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recordarme
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm" style="background-color: #117ab1; color: white;">
                                Iniciar Sesión
                            </button>
                            <a style="padding-left: 12px; border-color: #000000;" class="btn btn-sm btn-link" href="{{ url('/password/reset') }}">
                                Olvidaste tu contaseña?
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{url('auth/facebook')}}" class="btn btn-facebook" style="color: white; background-color: #3B5998;"><span class="fa fa-facebook"></span>&nbsp;&nbsp;&nbsp;Login con Facebook</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
