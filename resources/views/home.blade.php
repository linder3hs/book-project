@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    Bienvenido a Book
                    <div class="container-fluid">
                        <div id="contenedorIsbn">
                        <input  name="isbnbook" type="number" class="form-control" id="numberIsbn" placeholder="Ingrese un ISBN">
                        <br>
                        <input type="button" class="btn btn-sm btn-success btnBuscar" value="Buscar">
                        <div id="content"></div>
                        <img id="image" alt="">
                        <input id="btnRe" style="display: none;" type="submit" value="Registrar" class="btn btn-sm btn-primary">
                        <button id="btnCancel" class="btn btn-sm btn-default" style="display: none;">Cancelar</button>
                        </div>
                        <div class="sinIsbn" style="display: none;">
                            <p>No se encontro el libro con el isbn que puso porfavor complete los datos.</p>
                            <form action="/home" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="title" type="text" class="form-control" placeholder="Titulo del libro"><br>
                                <input name="author" type="text" class="form-control" placeholder="Autor"><br>
                                <input name="public-date" type="text" class="form-control datepicker" id="datepicker" placeholder="Año de publicación"><br>
                                Importa una Imagen<input type="file"><br>
                                <input name="" type="submit" class="btn btn-sm btn-success" value="Guardar">
                                <button id="cancelSinIsbn" class="btn btn-sm btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
