@extends('layouts.appadmin')
@section('content')
<br><br>
<div align="center">
    <div class="table-responsive container center-block">
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
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->fehcaNacimiento}}</td>
                    <td>
                        <form action="{{ url('admin/updatenivel') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{ $user->id }}" name="userid">
                            <select name="nivel" id="">
                                <option value="5">De Baja</option>
                            </select>
                            <button type="submit" style="background-color: transparent; border-color: transparent;"><span class="fa fa-save"></span></button>
                        </form>
                    </td>
                    <td>{{ $user->nacionalidad}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection