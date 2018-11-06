@extends('layouts.appadmin')
@section('content')
<h1>Lista de usuarios certificadores</h1>
<br><br>
<div align="center">
    <div class="table-responsive container-fluid center-block">
        <table class="table table-striped">
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