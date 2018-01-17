@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <script>
        // Ajax para buscar libros por isbn

        // Capturamos el valor del input y traemos los datos en json
        $('.btnBuscar').on('click', function () {
            var isbn = $('#numberIsbn').val();
            if (isbn != ""){
                $('#numberIsbn').val("");
                $.ajax({
                    type: 'GET',
                    url: 'https://www.googleapis.com/books/v1/volumes?q=isbn:'+isbn,
                    data: { get_param: 'value' },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data['totalItems']);
                        if (data['totalItems'] == 1) {
                            var img = data['items']['0']['volumeInfo']['imageLinks']['smallThumbnail'];
                            console.log("foto: " + data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail']);
                            $('#content').html('<h5>Titulo del libro: ' + data['items'][0]['volumeInfo']['title'] + '</h5>' + '<p>Autor:  ' + data['items'][0]['volumeInfo']['authors'] + '</p>' + '<p>Año de publicación:  ' + data['items'][0]['volumeInfo']['publishedDate'] + '</p>' + '<br>');
                            $('#image').attr('src', data['items']['0']['volumeInfo']['imageLinks']['smallThumbnail']);
                            $('#btnRe').show();
                            $('#btnCancel').show();
                            $('.btnBuscar').hide();
                        } else {
                            bookNoFound();
                        }
                    }
                });
            } else {
                alert("Debe rellenar los campos o ingresar valores validos");
            }
        });

        $('#btnCancel').on('click', function () {
            $('#btnRe').slideUp();
            $('#btnCancel').slideUp();
            $('.btnBuscar').slideDown();
            $('#content').html("");
            $('#image').attr('src', "");
        });

        function bookNoFound() {
            $('#contenedorIsbn').slideUp();
            $('.sinIsbn').slideDown();
        }

        $('#cancelSinIsbn').on('click',function () {
            $('#contenedorIsbn').slideDown();
            $('.sinIsbn').slideUp();
        });



    </script>
@endsection
