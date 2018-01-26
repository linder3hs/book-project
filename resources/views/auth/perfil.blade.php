@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="container">
            <div class="navbar">
                <a href="/home" class="btn btn-sm  btn-success" style="border-radius: 20px;" ><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Home</a>
            </div>
        </div>
		<div class="">
			<div class="col-md-3 col-xs-12 col-sm-3">
				<img style="width: 50%" src="/images/{{ Auth::user()->avatar }}" class="img-responsive img-rounded">
				<p>Nombre: &nbsp; <span>{{ Auth::user()->name . " " .Auth::user()->second_name }}</span></p>
				<p>Apellido: &nbsp; <span>{{ Auth::user()->apellido }}</span> </p>
				<p>E-mail: &nbsp; <span>{{ Auth::user()->email }}</span> </p>
				<form>
					<a href="/home/edit/{{ Auth::user()->id}}" class="btn btn-sm btn-success">Actualizar</a>
				</form>
			</div>
		</div>
	</div>
@endsection