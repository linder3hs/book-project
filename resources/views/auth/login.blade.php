@extends('layouts.app')
@section('content')
<div style="background-color: #117ab1;">
    <div class="container mx-auto">
        <br>
        <div class="row mx-auto" align="center">
            <div class="card card-body mx-auto col-md-6" style="margin: 10px;">
                <div align="center" class="text-primary">
                    <span class="fa fa-address-card" style="font-size: 32px;"></span><br>
                    <h4 class="text-center">Iniciar Sesión</h4><br>
                </div>
                @include('partials.flash')
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-11">
                            <input id="email" placeholder="Email address" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-11">
                            <input id="password" placeholder="Password" type="password" class="form-control form-control-lg" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recordarme
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11">
                            <button type="submit" class="btn btn-block btn-lg" style="background-color: #117ab1; color: white;">
                                Iniciar Sesión
                            </button>
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
        <div class="col-md-12 col-md-offset-4" align="center">
            <div align="">
                <a style="padding-left: 12px;" class="text-white" href="{{ url('/password/reset') }}">
                    Olvidaste tu contaseña?
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
