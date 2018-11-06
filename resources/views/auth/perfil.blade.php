@extends('layouts.app')

@section('content')
	<hr class="">
	<div class="container target">
		<div class="">
			<form action="{{ url('home/perfil') }}" method="get" class="form-inline my-2 my-lg-0">
            	<input name="buscador" class="form-control mr-sm-2" type="text" placeholder="Buscar">
            	<button class="btn btn-primary" type="submit">Search</button>
        	</form>
		</div>
		<br>
		<hr>
		<div class="row">
			<div class="col-sm-10">
				<h1 class="">{{ Auth::user()->name }}</h1>
				<a href="{{url('/home/edit/' .  Auth::user()->id)}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Editar perfil</a>
				<br>
			</div>
			<div class="col-sm-2"><a href="{{url('/home/perfil')}}" class="pull-right"><img title="profile image" class="rounded img-thumbnail" src="{{url('/images/' . Auth::user()->avatar) }}"></a></div>
		</div>
			<!--/col-3-->
			<div class="col-sm-9" style="" contenteditable="false">
				<div class="panel panel-default">
					<div class="panel-heading">{{ Auth::user()->name . " " .Auth::user()->last_name }}</div>
					<div class="panel-body">{{ Auth::user()->email }}.</div>
				</div>
			</div>
			<br><br>
			<br><br>
			<br><br>
        </div>
    </div>
@endsection