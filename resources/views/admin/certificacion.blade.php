@extends('layouts.appadmin')
@section('content')
    <div class="container">
        <div align="center" style="margin-top: 40px;">
            <h4>Solicitud de Certificaciones</h4>
        </div>
        <div class="center-block" align="center" style="width: 100%; display: contents; margin-top: 40px;">
            <table class="table table-striped table-hover table-responsive text-center">
                <tr>
                    <th>Libro</th>
                    <th>ISBN</th>
                    <th>Usuario</th>
                    <th>Fecha de Creación</th>
                    <th>Aprobar</th>
                </tr>
                @foreach($certificaciones as $certificacion)
                    @if($certificacion->estado == 0)
                        <tr>
                            <td>{{ $certificacion->libro }}</td>
                            <td>{{ $certificacion->isbn }}</td>
                            <td>{{ $certificacion->name . " " . $certificacion->apellido }}</td>
                            <td>{{ $certificacion->created_at }}</td>
                            <td>
                                <form action="{{ url(('/admin/aprobarCertificacion')) }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="book_id" value="{{ $certificacion->book_id }}">
                                    <input type="hidden" name="idc" value="{{ $certificacion->id }}">
                                    <button type="submit"><span class="fa fa-save"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <br>
        <br>
        <br>
        <br><br><br><br>
    </div>
@endsection