@extends('layouts.app')
@section('content')
<br>
<div class="container" align="left">
    <h3>Lista de todos mis libros</h3>
    <hr>
</div>
<div class="container offset-top-40">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#register" role="tab" data-toggle="tab">Libros Registrados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#certificados" role="tab" data-toggle="tab">Libros Certificados</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <br>
        <div class="tab-content offset-top-30">
            <div role="tabpanel" class="tab-pane active" id="register">
                <div class="row">
                    @foreach($createb as $book)
                        <div class="col-sm-4">
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
                                    <h6 class="font-weight-bold">Idioma: {{ $book->language }}</h6>
                                    <h6 class="font-weight-bold">Descripción:</h6>
                                    <p>{{ $book->description }}</p>
                                    <p>
                                        <span class="font-weight-bold">Fecha de Registro:&nbsp;</span><span>{{ $book->created_at }}</span>
                                    </p>
                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="certificados">
                <div class="row">
                    @foreach($certificateb as $book)
                        <div class="col-sm-4">
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
                                    <h6 class="font-weight-bold">Idioma: {{ $book->language }}</h6>
                                    <h6 class="font-weight-bold">Descripción:</h6>
                                    <p>{{ $book->description }}</p>
                                    <p>
                                        <span class="font-weight-bold">Fecha de creación:&nbsp;</span>
                                        <span>{{ $book->created_at }}</span>
                                    </p>
                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection