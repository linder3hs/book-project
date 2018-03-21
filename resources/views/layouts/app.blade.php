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
<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #009688;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->
    <a class="navbar-brand" href="{{ url('/home/publicaciones') }}"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Antu_scuolabook.svg/120px-Antu_scuolabook.svg.png" alt="" style="height: 60px; width: 60px;"></a>
    <!-- Links -->
    <div class="collapse navbar-collapse" id="nav-content">
        <ul class="navbar-nav">
            @if (Auth::guest())
                <li class="nav-item active" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="{{ url('/login') }}">Inciar Sesión &nbsp;&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="{{ url('/register') }}">Registrate &nbsp;&nbsp;&nbsp;</a>
                </li>
            @else
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
                </form>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="{{ url('/home/publicaciones') }}">Inicio &nbsp;&nbsp;&nbsp;</a>
                </li>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline; color: #FFFFFF;">
                        Logro
                    </a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="{{ url('#') }}">Libros Acreditados</a>
                        <a class="dropdown-item" href="{{ url('#') }}">Acreditaciones</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline; color: #FFFFFF;">
                        Meta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/home">Registro de Libros</a>
                        <a class="dropdown-item" href="{{ url('/home/lista') }}">Postulación</a>
                        <a class="dropdown-item" href="#">Certificación</a>
                        <a class="dropdown-item" href="#">Acreditación</a>
                    </div>
                </div>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="/home">Seguir &nbsp;&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="/home">Red &nbsp;&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="/home">Ayuda &nbsp;&nbsp;&nbsp;</a>
                </li>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline; color: #FFFFFF;">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="{{ url('/home/perfil') }}">Yo</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            Salir &nbsp;&nbsp;&nbsp;
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
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
<footer class="page-footer font-small blue pt-4 mt-4" style="background-color: #117ab1;">

    <!--Footer Links-->
    <div class="container-fluid text-center text-md-left">
        <div class="row">

            <!--First column-->
            <div style="color: white;" class="col-md-12" align="center">
                <h5 class="text-uppercase">El Gran Lector</h5>
                <p>Es una red donde podra compartir, certificarte y cononcer a personas que le gusta leer</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div style="color: white;" class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2018 Copyright El Gran Lector

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
</html>


