@extends('layouts.app')
@section('content')
    <br><br>
    <div class="container">
    <form action="{{ url('searchlist') }}" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <h3>Lista de mis libros</h3>
    @foreach($libros as $libro)
        @if( $libro->user_id == Auth::user()->id)
                <div class="list-group">
                    <a class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $libro->title }}</h5>
                        </div>
                        <span>Autor: {{ $libro->author }}</span><br>
                        <span>{{ substr($libro->public_date,0) }}</span><br>
                        <div class="d-flex w-100 justify-content-between">
                            @if(strpos($libro->image, 'http') !== false)
                                <img src="{{ $libro->image }}" class="img-fluid rounded">
                            @else
                                <img src="/images/{{ $libro->image }}" class="img-fluid rounded" style="height: 130px; width:auto;">
                            @endif
                        </div>
                    </a>
                    <div class="list-group-item" align="center">
                        @if($libro->estado == 0)
                        <form action="{{ url('/home/solicitarExamen') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idbook" value="{{ $libro->id }}">
                            <input name="libro" type="hidden" value="{{ $libro->title }}">
                            <input name="isbn" type="hidden" value="{{ $libro->isbn }}">
                            <input type="submit" class="btn" style="border-color: #000000;" value="CERTIFICAR">
                        </form>
                        @elseif($libro->estado == 1)
                            <p>Esperando aprobacion...</p>
                        @elseif($libro->estado == 2)
                            <a href="{{ url('home/preguntas/' . $libro->isbn) }}" class="btn" style="border-color: #000000;" >Dar examen</a>
                        @endif

                    </div>
                </div>
                <br>

        @endif
    @endforeach
    </div>
@endsection