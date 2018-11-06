@extends('layouts.app')
@section('content')
    <!-- <div style="background-color: #117ab1; padding: 14px;">
        <h2 class="text-center text-white">Registrar un libro</h2>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container">
        <div class="row" style="margin: 10px; margin-top: 40px;">
            <div class="col-md-6 offset-top-30">
                <div align="">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-header bg-primary text-white">Para poder registrar un libro solo ingresa el <strong>ISBN</strong>.</div>
                            <div id="contenedorIsbn">
                                <div class="form-group col-md-11 offset-top-20">
                                    <input name="isbnbook" type="number" class="form-control form-control-lg card-text" id="numberIsbn" placeholder="Ingrese un ISBN">
                                    <div class="offset-top-10" align="left" >
                                        <button type="button" class="btn btn-lg btn-outline-primary btnBuscar">Buscar&nbsp;<span class="fa fa-search"></span>&nbsp;</button>
                                    </div>
                                    <div id="content"></div>
                                    <img id="image" alt="">
                                </div>
                                <!-- Form para libro encontrado -->
                                <form action="{{url('/home')}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="titlere" name="titlere">
                                    <input type="hidden" id="autorre" name="autorre">
                                    <input type="hidden" id="anopure" name="anopure">
                                    <input type="hidden" id="imgre" name="imgre">
                                    <input type="hidden" id="isbn" name="isbn">
                                    <input type="hidden" id="idiomare" name="idiomare">
                                    <input type="hidden" id="descre" name="descre">
                                    <div class="form-group" style="margin: 15px;">
                                        <input id="btnRe" style="display: none;" type="submit" value="Registrar" class="btn btn-md btn-primary">
                                        <button id="btnCancel" class="btn btn-md btn-outline-danger" style="display: none;">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Form para libro no encontrado -->
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
            <div class="col-md-6 offset-top-30">
                <div align="center">
                    <h3>¿Qué es <strong>ISBN</strong>?</h3>
                    <p class="text-primary text-left">Un ISBN es un código normalizado internacional para libros (International Standard Book Number). Los ISBN tuvieron 10 dígitos hasta diciembre de 2006 pero, desde enero de 2007, tienen siempre 13 dígitos. Los ISBN se calculan utilizando una fórmula matemática específica e incluyen un dígito de control que valida el código.</p>
                    <img src="https://www.edelvives.com/cdn/Uploads/editor/Image/Codigo-ISBN-Castellano-big.png" height="200" width="300" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="offset-top-140"></div>
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
                            console.log(data['items']['0']['volumeInfo']['language']);
                            console.log(data['items']['0']['volumeInfo']['description']);
                            $('#imgre').val(img);
                            console.log("foto: " + data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail']);
                            $('#titlere').val(data['items'][0]['volumeInfo']['title']);
                            $('#autorre').val(data['items'][0]['volumeInfo']['authors']);
                            $('#anopure').val(data['items'][0]['volumeInfo']['publishedDate']);
                            $('#idiomare').val(data['items']['0']['volumeInfo']['language']);
                            $('#descre').val(data['items']['0']['volumeInfo']['description']);
                            $('#isbn').val(data['items'][0]['volumeInfo']['industryIdentifiers'][0]['identifier']);
                            $('#content').html('<h5>Titulo del libro: ' + data['items'][0]['volumeInfo']['title'] + '</h5>' + '<p>Autor:  ' + data['items'][0]['volumeInfo']['authors'] + '</p>' + '<p>Año de publicación:  ' + data['items'][0]['volumeInfo']['publishedDate'] + '</p>' + '<p>Idioma: ' + data['items']['0']['volumeInfo']['language'] +'</p>' + '<p>Decripcion: <br>' + data['items']['0']['volumeInfo']['description'] +'</p>' + '<br>');
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
