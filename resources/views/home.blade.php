@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    Bienvenido a Book
                    <div class="container-fluid">
                        <form action="" method="post">
                            <input type="number" class="form-control" placeholder="Ingrese un ISBN">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
