@extends('layouts.app')
@section('content')
    <div style="background-color: #117ab1; padding: 14px;">
        <h2 class="text-center text-white">Registrar un libro</h2>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container">
    <div align="center" style="margin: 10px; margin-top: 40px;">
        <div class="col-md-8">
            <div align="center">
                <div class="card">
                    <span style="margin: 12px;">Para poder registra un libro solo ingresa en <strong>ISBN</strong> de este.</span>
                    <div class="card-block">
                        <div id="contenedorIsbn" style="margin: 6px;">
                                <input name="isbnbook" type="number" class="form-control card-text" id="numberIsbn" placeholder="Ingrese un ISBN">
                                <br>
                                <input type="button" class="btn btn-sm btn-success btnBuscar" value="Buscar">
                                <div id="content"></div>
                                <img id="image" alt="">
                            <form action="{{url('/home')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="titlere" name="titlere">
                                <input type="hidden" id="autorre" name="autorre">
                                <input type="hidden" id="anopure" name="anopure">
                                <input type="hidden" id="imgre" name="imgre">
                                <input type="hidden" id="isbn" name="isbn">
                                <input id="btnRe" style="display: none;" type="submit" value="Registrar" class="btn btn-sm btn-primary">
                                <button id="btnCancel" class="btn btn-sm btn-default" style="display: none;">Cancelar</button>
                            </form>
                        </div>
                        <div class="sinIsbn container" style="display: none;">
                            <p>No se encontro el libro con el isbn que puso porfavor complete los datos.</p>
                            <form action="{{ url('/home/save')}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="title" type="text" class="form-control" placeholder="Titulo del libro"><br>
                                <input name="author" type="text" class="form-control" placeholder="Autor"><br>
                                <input name="public-date" type="text" class="form-control datepicker" id="datepicker" placeholder="Año de publicación"><br>
                                Importa una Imagen<input name="imagen" type="file"><br><br>
                                <input style="margin-top: 10px;" type="submit" class="btn btn-sm btn-success" value="Guardar">
                                <a id="cancelSinIsbn" class="btn btn-sm btn-default" style="border-color: #000000; margin-top: 10px;">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
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
                        console.log(data);
                        console.log(data['totalItems']);
                        if (data['totalItems'] == 1) {
                            var img = data['items']['0']['volumeInfo']['imageLinks']['smallThumbnail'];
                            $('#imgre').val(img);
                            console.log("foto: " + data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail']);
                            $('#titlere').val(data['items'][0]['volumeInfo']['title']);
                            $('#autorre').val(data['items'][0]['volumeInfo']['authors']);
                            $('#anopure').val(data['items'][0]['volumeInfo']['publishedDate']);
                            $('#isbn').val(data['items'][0]['volumeInfo']['industryIdentifiers'][0]['identifier']);
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
