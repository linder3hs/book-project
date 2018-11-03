@extends('layouts.app')
@section('content')
    <br>
    <div class="container" align="left">
        <h3>Lista de mis libros</h3>
        <hr>
    </div>
    <div class="container offset-top-40">
        @foreach($libros as $libro)
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $libro->title }}</h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Autor: {{ $libro->author }}</h4>
                    <p class="card-text">Año de Publicación: {{ substr($libro->public_date,0) }}</p>
                    <p>
                        @if(strpos($libro->image, 'http') !== false)
                            <img height="300" width="200" class="rounded mx-auto d-block" src="{{ $libro->image }}" height="300">
                        @else
                            <img height="300" width="200" class="rounded mx-auto d-block" src="/images/{{ $libro->image }}">
                        @endif
                    </p>
                    <div class="" align="center">
                        @if($libro->estado == 0)
                            <form action="{{ url('/home/solicitarExamen') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="idbook" value="{{ $libro->id }}">
                                <input name="libro" type="hidden" value="{{ $libro->title }}">
                                <input name="isbn" type="hidden" value="{{ $libro->isbn }}">
                                <input type="submit" class="btn btn-outline-success" value="CERTIFICAR">
                            </form>
                        @elseif($libro->estado == 1)
                            <p>Esperando aprobación...</p>
                        @elseif($libro->estado == 2)
                            <a href="{{ url('home/preguntas/' . $libro->isbn) }}" class="btn btn-outline-primary">Dar examen</a>
                        @endif
                    </div>
                </div>
            </div>
            <br><br>
        @endforeach
        <br>
    </div>
@endsection