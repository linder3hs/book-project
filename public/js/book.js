// Ajax para buscar libros por isbn

    //$(document).ready(function () {
    //});
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

$("#txtnumberask").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl/cmd+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+C
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+X
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

