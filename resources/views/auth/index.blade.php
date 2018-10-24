@extends('layouts.app')

@section('content')

  <div class="bg_image align-middle">
      <div align="center">
          <div class="container-fluid text-white" style="font-weight: bold; position: absolute;">
              <br>
              <h1 class="mb-4">El Gran lector</h1>
              <h3 class="mb-5">
                  Registra y certificate leyendo tus libro prefierido
              </h3>
              <a href="{{ url('/login') }}" class="btn btn-primary">Inicias Sesión</a>&nbsp; ó &nbsp;
              <a href="{{ url('/register') }}" class="btn btn-success">Registrarse</a>
          </div>
      </div>
    </div>
  </div>
  <!-- About -->
  <section class="content-section bg-light" style="margin-top: 30px;">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="text-primary font-weight-bold">Elige un plan y empieza a leer</h2>
          <div class="container-fluid" style="margin-top: 30px;">
              <table class="table table-bordered table-striped table-hover border-primary font-weight-bold text-dark">
                  <thead class="thead-dark">
                  <tr>
                      <th>Que Obtienes</th>
                      <th>Free</th>
                      <th>Premium</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>Registro de Libros</td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Compartir Certificado</td>
                      <td class="text-danger h2"><span class="fa fa-times"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Resultado</td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Diploma</td>
                      <td class="text-danger h2"><span class="fa fa-times"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Record</td>
                      <td class="text-danger h2"><span class="fa fa-times"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Dar Examen</td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Solicitar Certificación</td>
                      <td class="text-danger h2"><span class="fa fa-times"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td>Seguimiento de Avance</td>
                      <td class="text-danger h2"><span class="fa fa-times"></span></td>
                      <td class="text-primary h2"><span class="fa fa-check"></span></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><button class="btn btn-outline-primary">Comprar plan</button></td>
                      <td><button class="btn btn-outline-primary">Comprar plan</button></td>
                  </tr>

                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <br><br>
  </section>
@endsection