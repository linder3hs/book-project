@extends('layouts.app')

@section('content')
	<h1 style="font-family: 'Helvetica'; font-size: 20px; color: #000; " class="text-dark">Gracias por unirse a nuestra comunidad</h1>

	<p class="h5">Usted necesita confirmar su correo<a href='{{ url("register/confirm/{$user->token}") }}'></a></p>
</body>
</html>
@endsection