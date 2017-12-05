@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">

                    Bienvenido a nuestran aplicacion
                    <div class="container-fluid">
                        <form action="" method="post">
                            <input type="text" class="form-control" placeholder="Ingrese un ISBN">
                        </form>
                    </div>
                    <?php
                        include ('simple_html_dom.php');
                    $html = file_get_contents('https://www.iberlibro.com/servlet/SearchResults?isbn=9780545010221&sts=t');
                    foreach($html->find('img') as $element)
                        echo $element->src . '<br>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
