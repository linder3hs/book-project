@extends('layouts.app')

@section('content')
    <form action="/home/perfil" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container">
            <p class="h3">Edita tu perfil</p>
        </div>
        <div class="container">
            <div class="form-group">
                <div class="col-md-6">
                    <input name="first_name" value="{{ ucfirst(Auth::user()->name) }}" type="text" class="form-control" placeholder="Primer Nombre"><br>
                    <input name="second" value="{{ ucfirst(Auth::user()->second_name)  }}" type="text" class="form-control" placeholder="Segundo Nombre"><br>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input name="last_name" type="text" value="{{ ucfirst(Auth::user()->apellido) }}" class="form-control" placeholder="Primer Apellido"><br>
                        <input name="second_last" type="text" value="{{ ucfirst(Auth::user()->second_last_name)  }}"  class="form-control" placeholder="Segundo Apellido"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input name="date_born" type="text" value="{{ Auth::user()->fechadeNacimiento }}" class="form-control" placeholder="Fecha de Nacimiendo"><br>
                        <input name="age" type="text" value="{{ Auth::user()->age  }}" class="form-control" placeholder="Edad"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input name="country" value="{{ ucfirst(Auth::user()->nacionalidad) }}" type="text" class="form-control" placeholder="Pais"><br>
                        <input name="department" value="{{ ucfirst(Auth::user()->provincia) }}" type="text" class="form-control" placeholder="Departamiento/Estado"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Pon tu foto de perfil</label>
                        <input type="file" name="profile" value="Foto">
                    </div>
                </div>
                <div class="form-group" align="center">
                    <div class="col-md-12">
                        <input type="submit" value="Guardar" class="btn btn-sm btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
