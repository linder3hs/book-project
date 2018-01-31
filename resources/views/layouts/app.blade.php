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
<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
</a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        @if (Auth::guest())
        <li class="sidebar-brand">
            <a href="{{ url('/login') }}">Inciar Sesión</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="{{ url('/register') }}">Registrate</a>
        </li>
        @else
        <li class="sidebar-nav-item">
            <a href="/home">Home</a>
        </li>
        <li class="sidebar-nav-item">
                <a href="/home/lista">Mis Libros</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="/home/publicaciones">Publicaciones</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="{{ url('/home/perfil') }}">Perfil</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Salir
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @endif
    </ul>
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

