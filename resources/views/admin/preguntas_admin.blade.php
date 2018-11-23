@extends('layouts.appadmin')
@section('content')
    <br>
    <div class="container-fluid page-header offset-top-30">
        <div align="center">
            <h2>Administración de preguntas</h2>
        </div>
        <br>
        <div class="container-fluid col-lg-6">
            <div class="card">
                <div class="card-header bg-warning text-center text-white font-weight-bold">Número de Preguntas</div>
                <div class="card-body">
                    <div>
                        @include('partials.flash')
                        <p class="h5">Setee un número de preguntas</p>
                        <form action="{{ url('admin/setAsk') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="txtnumberask" name="number" required type="number" class="form-control" placeholder="# preguntas">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-primary"><span class="fa fa-save"></span>&nbsp;Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection