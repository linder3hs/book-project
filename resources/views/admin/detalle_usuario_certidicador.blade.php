@extends('layouts.appadmin')
@section('content')
    @foreach($user as $u) 
        <h1>{{ $u->name }}</h1>
    @endforeach

    <h4>Historial de Libros</h4>

    @foreach($libros as $l)
        <p>{{ $l->title }}</p>
    @endforeach
@endsection