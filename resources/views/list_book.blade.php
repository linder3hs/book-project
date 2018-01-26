@extends('layouts.app')
@section('content')
    <div class="container">
    <h3>Lista de mis libros</h3>
    @foreach($libros as $libro)
        @if( $libro->user_id == Auth::user()->id)
            <div class="form-group" style="border: solid 1px #ccc; background-color: #fff; border-radius: 8px;">
                <div style="padding: 8px;">
                    <h4>Titulo: {{ $libro->title }}</h4>
                    <p>Autor: {{ $libro->author }}</p>
                    <p><span class="glyphicon glyphicon-calendar">&nbsp;</span>Año de publicación: &nbsp;{{ substr($libro->public_date,0) }}</p>
                    <img src="{{ $libro->image }}" class="image-responsive" alt="">
                </div>
            </div>
        @endif
    @endforeach
    </div>
@endsection