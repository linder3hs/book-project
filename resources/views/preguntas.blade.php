@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1>Preguntas</h1>
    </div>
    <span style="color: white;">{{ $con = 1 }}</span>
    @foreach($preguntas as $pregunta)
        <div class="container">
            <span>{{ $con .") " .  $pregunta->pregunta }}</span><br>
            <span><input type="checkbox">&nbsp;&nbsp;{{ $pregunta->respuestados }}</span><br>
            <span><input type="checkbox">&nbsp;&nbsp;{{ $pregunta->respuestatres }}</span><br>
            <span><input type="checkbox">&nbsp;&nbsp;{{ $pregunta->respuestacuatro }}</span><br>
            <span><input type="checkbox">&nbsp;&nbsp;{{ $pregunta->respuestacorrecta }}</span><br><br>
        </div>
        <span style="color: white;">{{ $con++ }}</span>
    @endforeach
    <div class="form-group" align="center" style="padding-bottom: 20px; margin-bottom: 20px;">
        <a style="border-color: #000000;" class="btn btn-sm" href="{{ url('/home/respuestas') }}">Enviar respuestas</a>
    </div>
@endsection