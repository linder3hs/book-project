<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/stylish-portfolio.min.css" rel="stylesheet') }}">

    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/book.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book</title>
    <!-- Scripts -->
    <script>
        window.Laravel =<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link rel="shortcut icon" type="image/png" href="{{ url('/agenda.png') }}" />

</head>

<body id="page-top">
<nav class="navbar navbar-expand-sm navbar-light bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <!-- Links -->
    <div class="collapse navbar-collapse" id="nav-content">
        <ul class="navbar-nav">
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important; text-decoration: none;" href="{{ url('/admin/usuarios') }}">Usuarios &nbsp;&nbsp;&nbsp;</a>
                </li>
                <!-- <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important; text-decoration: none;" href="{{ url('/admin/preguntas') }}">Preguntas &nbsp;&nbsp;&nbsp;</a>
                </li> -->
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important; text-decoration: none;" href="{{ url('/admin/user/certificate') }}">Certificadores &nbsp;&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important; text-decoration: none;" href="{{ url('/admin/certificacion') }}">Certificaciones &nbsp;&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important; text-decoration: none;" href="{{ url('/admin/preguntas') }}">Preguntas &nbsp;&nbsp;&nbsp;</a>
                </li>
        </ul>
    </div>
</nav>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('/js/stylish-portfolio.min.js') }}"></script>

@yield('content')
</body>
<!--Footer-->
<footer class="page-footer font-small indigo pt-0" style="background-color: #117ab1; color: white;">

    <!--Footer Links-->
    <div class="container">

        <!--First row-->
        <div class="row" align="center">

            <!--First column-->
            <div class="col-md-12 py-5">

                <div class="mb-5 flex-center">

                    <!--Facebook-->
                    <a class="fb-ic">
                        <i class="fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!--Twitter-->
                    <a class="tw-ic">
                        <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!--Google +-->
                    <a class="gplus-ic">
                        <i class="fa fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!--Linkedin-->
                    <a class="li-ic">
                        <i class="fa fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!--Pinterest-->
                    <a class="pin-ic">
                        <i class="fa fa-pinterest fa-lg white-text fa-2x"> </i>
                    </a>
                </div>
            </div>
            <!--/First column-->
        </div>
        <!--/First row-->
    </div>
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright<div>
    <!--/Copyright-->

</footer>
<!--/Footer-->
                    
</html>


