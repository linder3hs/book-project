@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-group">
                <h4>Preguntas</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <a href="{{url ('#')}}" class="btn" style="border-color: #000000;">Guardar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection