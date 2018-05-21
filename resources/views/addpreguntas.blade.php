@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <div class="form-group">
                <br>
                <h4>Preguntas</h4>
                <form action="{{ '/home/createpregunta' }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input placeholder="Ingrese ISBN del libro" type="text" class="form-control col-md-12" name="isbn">
                    </div>
                    <div class="form-group">
                        <input placeholder="Ingrese una pregunta" type="text" class="form-control col-md-12" name="pregunta">
                    </div>
                    <div class="preguntitas"></div>
                    <a id="btnAdd" class="btn btn-default" style="border-color: #000000;"> add </a>
                    <br>
                    <div class="form-group">
                        <br>
                        <input type="submit" class="btn btn-default" style="border-color: #000000; background-color: #ffffff;" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
        <script>
            $('#btnAdd').on('click', function () {
                $('.preguntitas').append('<input type="text" placeholder="Ingrese una pregunta" class="form-control col-md-12" name="pregunta"><br>');
            });
        </script>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection