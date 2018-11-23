@extends('layouts.appadmin')
@section('content')
    <br>
    <div class="container-fluid page-header offset-top-30">
        <a style="text-decoration: underline;" href="{{ url('admin/user/certificate') }}"><span class="fa fa-arrow-circle-left"></span>&nbsp;Usuarios Certificadores</a>
    </div>
    <br>
    <div class="container-fluid">
        <?php $id = 0; ?>
        @foreach($user as $u)
            <h1>{{ $u->name . " " . $u->last_name }}</h1>
            <?php $id = $u->id; ?>
        @endforeach
        <hr class="dropdown-divider"><br>
    </div>
    <div class="container-fluid">
        <div class="card bg-warning text-white">
            <h3 class="card-header text-center">Historial de Libros</h3>
        </div>
        <div class="table-responsive" style="margin-top: 4px;">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>ISBN</th>
                        <th>Aprobar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($libros as $l)
                    <tr>
                        <td>{{ $l->title }}</td>
                        <td>{{ $l->author }}</td>
                        <td>{{ $l->isbn }}</td>
                        <td>
                            <form action="{{ url('admin/certificate/aprobar') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="book_id" value="{{ $l->id }}">
                                <input type="hidden" name="id_user" value="{{ $id }}">
                                <input type="submit" class="btn btn-success" value="Si">
                            </form>
                            <!-- <a href="" class="btn btn-danger">No</a> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection