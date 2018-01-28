@extends('layouts.app')

@section('content')
  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">El Gran lector</h1>
      <h3 class="mb-5">
        <em>la red más grande de lectores</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Nosotros</a>
    </div>
    <div class="overlay"></div>
  </header>

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
  </section>

  <!-- Services -->
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Redes Sociales</h3>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-social-facebook"></i>
            </span>
          <h4>
            <strong>Facebook</strong>
          </h4>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-social-youtube"></i>
            </span>
          <h4>
            <strong>Youtube</strong>
          </h4>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-social-instagram"></i>
            </span>
          <h4>
            <strong>Instagram</strong>
          </h4>
        </div>
        <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-social-linkedin"></i>
            </span>
          <h4>
            <strong>Linkedin</strong>
          </h4>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer text-center">
    <div class="container">
      <p class="text-muted small mb-0">Copyright &copy; El Gran lector 2018</p>
    </div>
  </footer>
@endsection