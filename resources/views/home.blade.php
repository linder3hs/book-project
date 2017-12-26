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
                                                console.log(data['items'][0]['volumeInfo']['title']);
                                                $('#content').html('<h5>Titulo del libro' + data['items'][0]['volumeInfo']['title'] + '</h5>'+'<br>');
                                                $('#content').html('<p>'+data['items'][0]['volumeInfo']['authors'] + '</p>' +'<br>');
                                                $('#content').html('<p>'+data['items'][0]['volumeInfo']['publishedDate'] + '</p>' + '<br>');
                                            }
                                        });
                                    } else {
                                        alert("Ingrese un isbn valido");
                                    }
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
