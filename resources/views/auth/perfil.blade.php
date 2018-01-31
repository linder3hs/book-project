@extends('layouts.app')

@section('content')
	<hr class="">
	<div class="container target">
		<div class="row">
			<div class="col-sm-10">
				<h1 class="">{{ Auth::user()->name }}</h1>
				<a href="/home/edit/{{ Auth::user()->id}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Actualizar</a>
				<br>
			</div>
			<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="rounded img-thumbnail" src="/images/{{ Auth::user()->avatar }}"></a></div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<!--left col-->
				<ul class="list-group">
					<li class="list-group-item text-muted" contenteditable="false">Perfil</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Se Unio</strong></span> 2.13.2014</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Last seen</strong></span> Yesterday</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span> {{ Auth::user()->name }}</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Role: </strong></span> Pet Sitter

					</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">Redes Sociales</div>
					<div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i>
                        <i class="fa fa-github fa-2x"></i>
						<i class="fa fa-twitter fa-2x"></i>
                        <i class="fa fa-pinterest fa-2x"></i>
                        <i class="fa fa-google-plus fa-2x"></i>
					</div>
				</div>
			</div>
			<!--/col-3-->
			<div class="col-sm-9" style="" contenteditable="false">
				<div class="panel panel-default">
					<div class="panel-heading">{{ Auth::user()->name . " " .Auth::user()->apellido }}</div>
					<div class="panel-body">{{ Auth::user()->email }}.</div>
				</div>
			</div>
        </div>
    </div>
@endsection