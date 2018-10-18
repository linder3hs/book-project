@extends('layouts.appadmin')
@section('content')
<h1>Lista de usuarios certificados</h1>
<br><br>
<style>
    .table-responsive {
        display: contents;
    }
</style>
<div align="center" style="width: 100%; display: contents">
    <div class="container-fluid center-block">
        <table class="table table-striped table-responsive">
            <tr>
                <td style="width: 10%;">Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td>F. Nac</td>
                <td>Nivel</td>
                <td>Nacionalidad</td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td><a href="{{ url('/admin/user/detail/' . $user->id) }}">{{ $user->name}}</a></td>
                <td>{{ $user->apellido}}</td>
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