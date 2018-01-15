@extends('layouts.app')

@section('content')
    <form action="">
        <div class="container">
            <p class="h3">Edita tu perfil</p>
        </div>
        <div class="container">
            <div class="form-group">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Primer Nombre"><br>
                    <input type="text" class="form-control" placeholder="Segundo Nombre"><br>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Primer Apellido"><br>
                        <input type="text" class="form-control" placeholder="Segundo Apellido"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Fecha de Nacimiendo"><br>
                        <input type="text" class="form-control" placeholder="Edad"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Pais"><br>
                        <input type="text" class="form-control" placeholder="Departamiento/Estado"><br>
                    </div>
                </div>
                <div class="form-group" align="center">
                    <div class="col-md-12">
                        <button class="btn btn-lg btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
