@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <div class="form-group">
                <br>
                @include('partials.flash')
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Preguntas</h5>
                            </div>
                            <div class="col-md-6">
                                <?php $number = Auth::user()->number_ask_user - count($preguntas) ?>
                                <h6 style="text-align: right;">Número de preguntas restantes: @if ($number <=0) 0 @else {{ $number }} @endif</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @if ($number <= 0)
                    <div class="card bg-dark text-center">
                        <div align="center" style="margin: 20px;">
                            <img src="http://www.expotrade.com.ar/reglamento/images/4/47/Alerta.png" width="100" height="100" alt="">
                        </div>
                        <div align="center">
                            <div class="col-md-6" style="margin: 20px;">
                                <h4 class="text-white">Por ahora no puedes realizar preguntas haz alcanzado el limite de preguntas disponibles.</h4>
                            </div>
                        </div>

                    </div>
                @else
                    <form action="{{ url('/home/createpregunta') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <select name="isbn" id="" class="form-control">
                                @foreach($certificaciones as $cer)
                                    <option value="{{ $cer->isbn }}">{{ $cer->isbn . " - " . $cer->libro }}</option>
                                @endforeach
                            </select>
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

                @endif
            </div>
        </div>
        <script>
            $('#btnAdd').on('click', function () {
                $('.preguntitas').append('<input type="text" placeholder="Ingrese una pregunta" class="form-control col-md-12" name="pregunta"><br>');
            });
        </script>
    </div>
@endsection