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
            <div class="list-group">
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $public->publicaciones }}</h5>
                        <small>Publicado por {{ $public->name }}</small>
                    </div>
                    <small>Hace {{ $public->created_at }}</small>
                    <br>
                <small>Comentarios</small>
                </a>
                @foreach($comentarios as $comentario)
                   @if( $comentario->pub_id == $public->id)
                    <ul class="list-group-item">
                    {{ $comentario->comentario }}
                    </ul>
                  @endif
                @endforeach
                <ul class="list-group">
                    <li class="list-group-item">
                        <form action="/home" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idpu" value="{{ $public->id }}">
                            <input type="text" name="comentario" class="form-control" style="height: 35px;">
                            <button type="submit" class="btn btn-sm btn-success"><span class="icon-pencil"></span></button>
                        </form>
                    </li>
                </ul>
            </div>
            <br>
        @endforeach
    </div>
@endsection