@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1>Preguntas</h1>
    </div>
    <span style="color: white;">{{ $con = 1 }}</span>
    @foreach($preguntas as $pregunta)
        <div class="container">
            <span>{{ $con .") " .  $pregunta->pregunta }}</span><br>
        </div>
        <span style="color: white;">{{ $con++ }}</span>
    @endforeach
    <div class="container">
    @foreach($respuestas as $res)
        <span><input type="checkbox">&nbsp;&nbsp;{{ $res->respuesta }}</span><br>
    @endforeach
    </div>
    <div class="form-group" align="center" style="padding-bottom: 20px; margin-bottom: 20px;">
        <a style="border-color: #000000;" class="btn btn-sm" href="{{ url('/home/respuestas') }}">Enviar respuestas</a>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection