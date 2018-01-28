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
    </div>
    <div class="container col-lg-4 col-md-offset-4">
        @foreach($publics as $public)
            <div class="container-fluid" style="border: 1px solid #d4d4d4; border-radius: 4px;">
                <div class="form-group">
                    <p>{{ $public->name }}</p>
                    <p>{{ $public->publicaciones }}</p>
                </div>
                <input type="text" class="form-control"> <br>
            </div>
            <br>
        @endforeach
    </div>
@endsection