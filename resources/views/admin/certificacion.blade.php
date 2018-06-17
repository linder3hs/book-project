@extends('layouts.appadmin')
@section('content')
    <div class="container">
        <div align="center">
            <h4>Certificaciones</h4>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive">
                <tr>
                    <th>Libro</th>
                    <th>ISBN</th>
                    <th>Usuario</th>
                    <th>Aprobar</th>
                </tr>
                @foreach($certificaciones as $certificacion)
                    <tr>
                        <td>{{ $certificacion->libro }}</td>
                        <td>{{ $certificacion->isbn }}</td>
                        <td>{{ $certificacion->user_id }}</td>
                        <td>
                            <form action="{{ url(('/admin/aprobarCertificacion')) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="book_id" value="{{ $certificacion->book_id }}">
                                <input type="hidden" name="idc" value="{{ $certificacion->id }}">
                                <button type="submit"><span class="fa fa-save"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection