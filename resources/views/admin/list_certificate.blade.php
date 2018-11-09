@extends('layouts.appadmin')
@section('content')
    <br>
<div class="container-fluid">
    <h1 class="text-dark">Lista de usuarios certificadores</h1>
</div>
<div align="center">
    <div class="table-responsive container-fluid center-block">
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="width: 10%;">Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>F. Nac</th>
                    <th>Nivel</th>
                    <th>Nacionalidad</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tr>
                <td><a style="text-decoration: underline;" class="text-primary font-weight-bold" href="{{ url('/admin/user/detail/' . $user->id) }}">{{ $user->name}}</a></td>
                <td>{{ $user->last_name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->fehcaNacimiento}}</td>
                <td>{{ $user->nivel }}</td>
                <td>{{ $user->nacionalidad}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection