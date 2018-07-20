@extends('layouts.app')
@section('content')
    <div style="background-color: #117ab1; padding: 14px;">
        <h2 class="text-center text-white">Publicaciones</h2>
    </div>
    <br><br>
    <style type="text/css">
        div#padre {
            height:28px;
            width:100%;
        }
        div#left {
            float:left;
            height:28px;
            width:330px;
            margin-right:25px;
            margin-left: 10px;
        }
    </style>
    <div id="padre" class="d-none d-lg-block">
        <div id="left" class="card">
            <div class="card-body" style="border: solid 1px black;">
                <div align="center" style="margin-top: 10px">
                    <img style="width: 100px; height: 100px;" src="{{url('/images/' . Auth::user()->avatar) }}" alt="" class="rounded-circle">
                    <h4 style="margin-top: 20px;">{{ Auth::user()->name . " " .Auth::user()->apellido }}</h4>
                    <p>Amor a los libros</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-5 col-md-offset-5">
        <div class="form-group">
            <h5>Tús publicaciones</h5>
            <form action="{{ url('/home/publicaciones') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea type="text" name="public" class="form-control" style="height: 150px;"></textarea><br>
                <input type="submit" value="Publicar" class="btn btn-success">
            </form>
        </div>
    </div>
    <div class="container col-lg-5 col-md-offset-5">
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
                        <form action="{{ url('/home/comment') }}" method="post">
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