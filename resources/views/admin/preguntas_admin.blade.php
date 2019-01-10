@extends('layouts.appadmin')
@section('content')
    <br>
    <div class="container-fluid page-header offset-top-30">
        <br>
        <div class="row">
            <div class="container-fluid col-md-6 col-xs-12 col-lg-6">
                <div class="card">
                    <div class="card-header bg-info text-center text-white font-weight-bold">Número de Preguntas</div>
                    <div class="card-body">
                        <div>
                            @include('partials.flash')
                            <p class="text-left">Cambiar el número máximo de preguntas</p>
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
            <div class="container-fluid col-md-6 col-xs-12 col-lg-6">
                <div class="card">
                    <div class="card-header bg-info text-center text-white font-weight-bold">
                        Tiempo total de examen
                    </div>
                    <div class="card-body">
                        <div align="center">
                            <p class="text-left">Cambia el tiempo total de los examenes</p>
                            @include('partials.flash')
                            <form action="{{ url('admin/setTimeTest') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select name="time" class="form-control">
                                        <option value="15">15 minutos</option>
                                        <option value="30">30 minutos</option>
                                        <option value="1">1 hora</option>
                                        <option value="1:30">1 hora y 30 minutos</option>
                                    </select>
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
    </div>
    <br>
    <br><br>
@endsection