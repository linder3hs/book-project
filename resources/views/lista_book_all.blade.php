@extends('layouts.app')
@section('content')
<br>
<div class="container" align="left">
    <h3>Lista de todos mis libros</h3>
    <hr>
</div>
<div class="container offset-top-40">
    @foreach($books as $book)
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3>{{ $book->title }}</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title">Autor: {{ $book->author }}</h4>
                <p class="card-text">Año de Publicación: {{ substr($book->public_date,0) }}</p>
                <p>
                    @if(strpos($book->image, 'http') !== false)
                        <img height="300" width="200" class="img-fluid img-thumbnail rounded mx-auto d-block" src="{{ $book->image }}" height="300">
                    @else
                        <img height="300" width="200" class="img-fluid img-thumbnail rounded mx-auto d-block" src="/images/{{ $book->image }}">
                    @endif
                </p>
            </div>
            <div class="container">
                <h6>Idioma: {{ $book->language }}</h6>
                <h6>Descripción:</h6>
                <p>{{ $book->description }}</p>
            </div>
        </div>
        <br><br>
    @endforeach
    <br>
</div>
@endsection