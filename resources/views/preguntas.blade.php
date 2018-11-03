@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1>Preguntas</h1>
    </div>
    <span style="color: white;">{{ $con = 1 }}</span>
    @if(count($preguntas) > 1)
        @foreach($preguntas as $pregunta)
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary text-white"><span>{{ $con .") " .  $pregunta->pregunta }}</span><br></div>
                    <div class="card-body">
                        <input type="radio" value="{{ $pregunta->respuesta2 }}"> {{ $pregunta->respuesta2 }}<br>
                        <input type="radio" value="{{ $pregunta->respuesta3 }}"> {{ $pregunta->respuesta3 }}<br>
                        <input type="radio" value="{{ $pregunta->respuesta4 }}"> {{ $pregunta->respuesta4 }}<br>
                        <input type="radio" value="{{ $pregunta->respuesta5 }}"> {{ $pregunta->respuesta5 }}<br>
                    </div>
                </div>

            </div>
            <span style="color: white;">{{ $con++ }}</span>
        @endforeach
        <div class="form-group" align="center" style="padding-bottom: 20px; margin-bottom: 20px;">
            <a style="border-color: #000000;" class="btn btn-sm" href="{{ url('/home/respuestas') }}">Enviar respuestas</a>
        </div>
    @else
        <div class="container" style="padding: 10px; border-radius: 6px; background-color: #FFFFBA;">
            <h4 class="text-dark">Aun no hay preguntas para este libro</h4>
        </div>
    @endif
    <br>
    <br>
    <br>
    <br>
@endsection