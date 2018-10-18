@extends('layouts.appadmin')
@section('content')
    @foreach($user as $u) 
        <h1>{{ $u->name }}</h1>
    @endforeach
@endsection