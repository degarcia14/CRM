<html>
<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Login de CA</title>
</head>
<body>
	 <div class="titles">
    <h1>Iniciar Sesión</h1>
	</div>
	<!-- Formulario -->
	<form method="post" id="main" action="autenticar.php">	
		<!-- Usuario -->
		<label id="label">Nombre de usuario:</label>
		<input type="text" name="usuario" placeholder="Nombre de Usuario">
		<br/>
		<!-- Contraseña -->
		<label id="label">Contraseña:</label>
		<input type="password" name="contrasena" placeholder="Contraseña"><br/>
		<!-- Enviar -->
		<button type="submit" value="ingresar" class="btn btn-primary">Ingresar</button>
		<button type="reset" value="limpiar" class="btn btn-primary">Limpiar</button><br/>
		<!--<?php $Guardado = "ok" ?>	-->
	</form>	
</body>
</html>