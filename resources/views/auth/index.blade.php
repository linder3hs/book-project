@extends('layouts.app')

@section('content')
  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
    <br>
      <h1 class="mb-1">El Gran lector</h1>
      <h3 class="mb-5">
        <em>la red más grande de lectores</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Nosotros</a>
    </div>
    <div class="overlay"></div>
  </header>
<br><br>
  <!-- About -->
  <section class="content-section bg-light" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>¿Quiénes somos?</h2>
          <p class="lead mb-5">Somos la comunidad de lectores mas grande del mundo</p>
          <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">Redes Sociales</a>
        </div>
      </div>
    </div>
    <br><br>
  </section>
@endsection