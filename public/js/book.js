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
                    if (data == 'success') {
                        var img = data['items']['0']['volumeInfo']['imageLinks']['smallThumbnail'];
                        console.log("foto: " + data['items'][0]['volumeInfo']['imageLinks']['smallThumbnail']);
                        $('#content').html('<h5>Titulo del libro: ' + data['items'][0]['volumeInfo']['title'] + '</h5>' + '<p>Autor:  ' + data['items'][0]['volumeInfo']['authors'] + '</p>' + '<p>Año de publicación:  ' + data['items'][0]['volumeInfo']['publishedDate'] + '</p>' + '<br>');
                        $('#image').attr('src', img);
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
});
