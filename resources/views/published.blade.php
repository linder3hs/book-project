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
        textarea:focus {
            outline: 0 none;
        }
    </style>
    <div id="padre" class="d-none d-lg-block">
        <div id="left" class="card">
            <div class="card-body" style="border: solid 1px black;">
                <div align="center" style="margin-top: 10px">
                    <img style="width: 100px; height: 100px;" src="{{url('/images/' . Auth::user()->avatar) }}" alt="" class="rounded-circle">
                    <h4 style="margin-top: 20px;">{{ Auth::user()->name . " " .Auth::user()->last_name }}</h4>
                    <p>Amor a los libros</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-5 col-md-offset-5">
        <div class="form-group">
            <form action="{{ url('/home/publicaciones') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <textarea placeholder="Comparte tus conecimeintos" type="text" name="public" class="form-control" style="height: 100px; margin-bottom: 0px; resize: none; border: 0; outline: none; box-shadow: none;"></textarea><br>
                    <div align="right" style="margin-top: 0px;">
                        <hr>
                        <input type="submit" value="Publicar" style="background-color: #117ab1; color: white; margin-top: 0px; margin-bottom: 10px; margin-right: 10px;" class="btn btn-sm">
                    </div>
                </div>
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
                    <small><span class="fa fa-calendar-times-o"></span> Desde el {{ date('d-m-Y', strtotime($public->created_at)) }}</small>
                    <br>
                </a>
                <li class="list-group-item">
                    <form action="{{ url('/home/comment') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idpu" value="{{ $public->id }}">
                        <div class="input-group mb-3">
                            <input type="text" style="outline: none; box-shadow: none;" name="comentario" class="form-control" placeholder="Escribe un comentario..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><span class="fa fa-send"></span></button>
                            </div>
                        </div>
                    </form>
                </li>
                @foreach($comentarios as $comentario)
                   @if( $comentario->pub_id == $public->id)
                    <ul class="list-group-item" style="background-color: #f3f6f8;">
                        <span class="text-dark font-weight-bold">{{ $comentario->name . " " . $comentario->last_name }}</span>
                        <span style="float: right; font-size: 12px;">{{ date('d-m-Y', strtotime($comentario->created_at)) }}</span>
                        <br>
                        <span style="font-size: 14px; font-family: Helvetica; ">{{ $comentario->comentario }}</span>
                    </ul>
                  @endif
                @endforeach
            </div>
            <br>
        @endforeach
    </div>
@endsection