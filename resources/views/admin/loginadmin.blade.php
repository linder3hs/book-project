@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="" align="center" style="margin-top: 20px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-title" style="font-weight: bold; font-size: 22px;">Iniciar Sesión Admin</div>

                    @include('partials.flash')

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="emailadmin" class="col-md-4 control-label" style="text-align: left;">Usuario</label>

                                <div class="col-md-6">
                                    <input id="emailadmin" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('emailadmin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label style="text-align: left;" for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

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
                                    <button type="submit" class="btn btn-sm btn-success">
                                        Iniciar Sesión
                                    </button>

                                    <a style="padding-left: 12px; border-color: #000000;" class="btn btn-sm btn-link" href="{{ url('/password/reset') }}">
                                        Olvidaste tu contaseña?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
