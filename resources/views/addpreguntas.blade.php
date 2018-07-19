@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <div class="form-group">
                <br>
                <h4>Preguntas</h4>
                <form action="{{ url('/home/createpregunta') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input required placeholder="Ingrese ISBN del libro" type="text" class="form-control col-md-12" name="isbn">
                    </div>
                    <div class="form-group">
                        <input required placeholder="Ingrese una pregunta" type="text" class="form-control col-md-12" name="pregunta">
                    </div>
                    <div class="preguntitas"></div>
                    <!--a id="btnAdd" class="btn btn-default" style="border-color: #000000;"> add </a-->
                    <div class="form-group">
                        <p>Ingrese las 4 respuestas de la pregunra</p>
                        <div class="form-group">
                            <p>Esta debera ser la respuesta correcta</p>
                            <input required class="form-control" type="text" name="r1" placeholder="Respuesta 1">
                        </div>
                        <div class="form-group">
                            <p>Estas son respuestas incorrectas</p>
                            <input required class="form-control" type="text" name="r2" placeholder="Respuesta 2">
                        </div>
                        <div class="form-group">
                            <input required class="form-control" type="text" name="r3" placeholder="Respuesta 3">
                        </div>
                        <div class="form-group">
                            <input required class="form-control" type="text" name="r4" placeholder="Respuesta 4">
                        </div>
                        <div class="form-group">
                            <input required class="form-control" type="text" name="r5" placeholder="Respuesta 5">
                        </div>
                    </div>
                    <div class="form-group">
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
@endsection