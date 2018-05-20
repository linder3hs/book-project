@extends('layouts.appadmin')

@section('content')
    <div class="container">
        <div class="">
            <div class="form-group">
                <br>
                <h4>Preguntas</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <input placeholder="Ingrese una pregunta" type="text" class="form-control col-md-12" name="pregunta">
                    </div>
                    <div class="preguntitas"></div>
                    <a id="btnAdd" class="btn btn-default" style="border-color: #000000;"> add </a>
                    <br>
                    <div class="form-group">
                        <br>
                        <a href="{{url ('#')}}" class="btn" style="border-color: #000000; background-color: #5cb85c;">Guardar</a>
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