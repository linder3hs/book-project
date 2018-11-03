@extends('layouts.appadmin')
@section('content')
<br><br>
<style>
    .table-responsive {
        display: contents;
    }
</style>
<div align="center" style="width: 100%; display: contents">
    <div class="container-fluid center-block">
        <table class="table table-striped table-responsive">
           <thead>
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
                @if($user->nivel == 1)
                    {{ $level = "Inscrito" }}
                @elseif($user->nivel == 2)
                    {{ $level = "Lector" }}
                @elseif($user->nivel == 3)
                    {{ $level = "Certificador" }}
                @elseif($user->nivel == 4)
                    {{ $level = "Certificador" }}
                @elseif($user->nivel == 5)
                    {{ $level = "Debaja" }}
                @endif
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->apellido}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->fehcaNacimiento}}</td>
                    <td>
                        <form action="{{ url('admin/updatenivel') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{ $user->id }}" name="userid">
                            <select name="nivel" id="">
                                <option value="{{ $user->nivel }}">{{ $level }}</option>
                            @foreach($tipos as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
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