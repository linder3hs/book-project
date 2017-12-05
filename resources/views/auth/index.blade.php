@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators hidden-xs">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div align="center" style="background-color: #3c3d3d;" class="carousel-inner hidden-xs">
    <div class="item active">
      <img style="width: 60%; height: 450px;" src="img/imgbook.jpg" class="img-responsive img-rounded with-3d-shadow">
    </div>

    <div class="item">
      <img style="width: 60%; height: 450px;" src="https://respuestas.tips/wp-content/uploads/2013/03/partes-de-un-libro.jpg" alt="Chicago" class="img-responsive img-rounded">
    </div>

    <div class="item">
      <img style="width: 60%; height: 450px;" src="https://previews.123rf.com/images/maxkabakov/maxkabakov1402/maxkabakov140200102/25534716-Concepto-de-red-social-Libro-cerrado-con-Blue-pulgar-hasta-el-icono-y-el-texto-de-la-red-social-en-e-Foto-de-archivo.jpg" alt="New York" class="img-responsive img-rounded">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection