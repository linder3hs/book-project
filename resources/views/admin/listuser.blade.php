@extends('layouts.appadmin')
@section('content')
<br><br>
<div align="center">
    <div class="table-responsive container center-block">
        <table class="table table-striped">
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
            {{ $level = "" }}
            @foreach($users as $user)
                @if($user->nivel == 1)
                    <?php $level = "Inscrito"; ?>
                @elseif($user->nivel == 2)
                    <?php $level = "Lector"; ?>
                @elseif($user->nivel == 3)
                    <?php $level = "Certificador"; ?>
                @elseif($user->nivel == 5)
                    <?php $level = "Debaja"; ?>
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
                                <option value="{{ $user->nivel }}"><?php echo $level; ?></option>
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