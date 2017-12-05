<!DOCTYPE html>
<html>
<head>
	<title>Confirmacion de E-mail</title>
</head>
<body>
	<h1>Gracias por unirse a nuestra comunidad</h1>

	<p>Usted necesita confirmar su correo <a href='{{ url("register/confirm/{$user->token}") }}'>Confirma tu cuenta</a></p>
</body>
</html>