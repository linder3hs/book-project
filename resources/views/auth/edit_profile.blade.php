@extends('layouts.app')
@section('content')
    <div style="background-color: #EDECEC;">
        <div class="container mx-auto">
            <div class="row mx-auto" align="center">
                <div class="card card-body mx-auto col-md-6" style="margin: 20px;">
                    <h3 class="card-title font-weight-bold">Edita tu perfil</h3>
                    <form action="{{url('/home/perfil')}}" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="first_name" value="{{ ucfirst(Auth::user()->name) }}" type="text" class="form-control" placeholder="Primer Nombre"><br>
                                </div>
                                <div class="col-md-12">
                                    <input name="second" value="{{ ucfirst(Auth::user()->second_name)  }}" type="text" class="form-control" placeholder="Segundo Nombre"><br>
                                </div>
                                <div class="col-md-12">
                                    <input name="last_name" type="text" value="{{ ucfirst(Auth::user()->apellido) }}" class="form-control" placeholder="Primer Apellido"><br>
                                    <input name="second_last" type="text" value="{{ ucfirst(Auth::user()->second_last_name)  }}"  class="form-control" placeholder="Segundo Apellido"><br>
                                </div>
                                <div class="col-md-12">
                                    <input name="date_born" type="date" value="{{ Auth::user()->fechadeNacimiento }}" class="form-control" placeholder="Fecha de Nacimiendo"><br>
                                    <input name="age" type="text" value="{{ Auth::user()->age  }}" class="form-control" placeholder="Edad"><br>
                                </div>
                                <div class="col-md-12">
                                    <input name="country" value="{{ ucfirst(Auth::user()->nacionalidad) }}" type="text" class="form-control" placeholder="Pais"><br>
                                    <input name="department" value="{{ ucfirst(Auth::user()->provincia) }}" type="text" class="form-control" placeholder="Departamiento/Estado"><br>
                                </div>
                                <div class="col-md-12">
                                    <label>Pon tu foto de perfil</label>
                                    <input class="form-control" type="file" required name="profile" value="Foto">
                                </div>
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <input type="submit" value="Guardar" class="btn btn-sm btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
