<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/stylish-portfolio.min.css" rel="stylesheet">

    <script src="/js/jquery.js"></script>
    <script src="/js/book.js"></script>



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book</title>
    <!-- Scripts -->
    <script>
        window.Laravel =<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link rel="shortcut icon" type="image/png" href="/agenda.png"/>

</head>

<body id="page-top">
<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #009688;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->
    <a class="navbar-brand" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Antu_scuolabook.svg/120px-Antu_scuolabook.svg.png" alt="" style="height: 60px; width: 60px;"></a>
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
                <li class="nav-item" style="color: #000000 !important;">
                    <a style="color: #FFFFFF !important;" href="/home/publicaciones">Inicio &nbsp;&nbsp;&nbsp;</a>
                </li>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline; color: #FFFFFF;">
                        Logro
                    </a>
                    <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item" href="#">Libros Acreditados</a>
                        <a class="dropdown-item" href="#">Acreditaciones</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline; color: #FFFFFF;">
                        Meta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/home">Registro de Libros</a>
                        <a class="dropdown-item" href="home/lista">Postulación</a>
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
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/js/stylish-portfolio.min.js"></script>

@yield('content')
</body>

</html>

