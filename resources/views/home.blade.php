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
                        <input  name="isbnbook" type="number" class="form-control" id="numberIsbn" placeholder="Ingrese un ISBN">
                        <br>
                        <input type="button" class="btn btn-sm btn-success btnBuscar" value="Buscar">

                        <div id="content"></div>
                        <img id="image" alt="">
                        <input id="btnRe" style="display: none;" type="submit" value="Registrar" class="btn btn-primary">
                        <button id="btnCancel" class="btn btn-default" style="display: none;">Cancelar</button>

                        <script>
                            // Ajax para buscar libros por isbn
                            var url = "https://www.googleapis.com/books/v1/volumes?q=isbn:9780545010221";
                            $(document).ready(function () {

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

                                                var img = data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail'];
                                                if (img != "") {
                                                    console.log("foto: "+ data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail']);
                                                    $('#content').html('<h5>Titulo del libro: ' +  data['items'][0]['volumeInfo']['title'] + '</h5>'+'<p>Autor:  '+data['items'][0]['volumeInfo']['authors'] + '</p>' +'<p>Año de publicación:  '+data['items'][0]['volumeInfo']['publishedDate'] + '</p>' + '<br>');
                                                    $('#image').attr('src', img);
                                                    $('#btnRe').show();
                                                    $('#btnCancel').show();
                                                    $('.btnBuscar').hide();
                                                } else {
                                                    $('#content').html("<p>Libro no encontrado</p>")
                                                    $('#image').attr('src', "");
                                                }

                                            }
                                        });
                                    } else {
                                        alert("Ingrese un isbn valido");
                                    }
                                });

                                $('#btnCancel').on('click', function () {
                                    $('#btnRe').slideUp();
                                    $('#btnCancel').slideUp();
                                    $('.btnBuscar').slideDown();
                                    $('#content').html("");
                                    $('#image').attr('src', "");
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
