@extends('layouts.app')

@section('content')
    <div class="container col-lg-4 col-md-offset-4">
        <div class="form-group">
            <h5>Tus publicaciones</h5>
            <form action="/home/publicaciones" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="public" class="form-control" style="height: 150px;"><br>
                <input type="submit" value="Publicar" class="btn btn-success">
            </form>
        </div>
    <h5>Otras Publicaciones</h5>
    </div>
    <div class="container col-lg-4 col-md-offset-4">
        <div class="form-group">
            @foreach($publics as $public)
                <p>{{ $public->publicaciones }}</p>
            @endforeach
        </div>
    </div>
@endsection