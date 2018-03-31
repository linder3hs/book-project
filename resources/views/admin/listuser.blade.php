@extends('layouts.appadmin')
@section('content')
<br><br>
<table class="table table-bordered">  
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Fecha de Nacimiento</th>
    
    @foreach($users as $user) 
        <tr>
            <td>{{ $user->name}}</td>
            <td>{{ $user->apellido}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->fehcaNacimiento}}</td>
        </tr>
    
    @endforeach
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection