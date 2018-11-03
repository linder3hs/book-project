<!DOCTYPE html>
<html>
<head>
	<title>Confirmacion de E-mail</title>
</head>
<body>
    <div class="titulo" align="center">
	    <h1>Gracias por unirse a nuestra comunidad</h1>
    </div>
    <div align="center">
        <!--->
        <p>Usted necesita confirmar su correo <a href='{{ url("register/confirm/{$user->token}") }}'>Confirma tu cuenta</a></p>
    </div>
</body>
</html>
<style>
    body {
        background-color: #8eb4cb;
    }
    .titulo {
       max-width: 600px;
    }

	h1 {
		font-family: Helvetica;
	}

	p {
		font-family: Helvetica;
    }
</style>