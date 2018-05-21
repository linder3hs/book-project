@extends('layouts.appadmin')
@section('content')
<br><br>
    <div class="container-fluid">
        <table class="table table-bordered">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>F. Nac</th>
            <th>Nivel</th>
            <th>Nacionalidad</th>

            @foreach($users as $user)
                @if($user->nivel == 1)
                    {{ $level = "Inscrito" }}
                @elseif($user->nivel == 2)
                    {{ $level = "Lector" }}
                @elseif($user->nivel == 3)
                    {{ $level = "Certificador" }}
                @elseif($user->nivel == 4)
                    {{ $level = "Acreditador" }}
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
                            <input type="hidden" value="{{ $user->id }}" name="userid">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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