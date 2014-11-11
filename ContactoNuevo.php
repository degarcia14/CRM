<html>
<head>
	<title>Contactos</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>NUEVO CONTACTO</h1><br/>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

    <form class="form-horizontal" role="form" action="ContactoGuardar.php" method="POST">
                    <!-- <div class="form-group">
                        <label for="inputRemitente" class="col-sm-2 control-label" id="label">Empresa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="remitente" id="remitente" placeholder="Nombre">
                                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Nit">
                            </div>
                    </div> -->

                    <div class="form-group">
                    	<label id="label"><h4>Datos Personales</h4></label>
                    		<div class="col-sm-10">
                                <label id="label">Nombre: </label><input type="text" name="nombreContacto" id="nombre" placeholder="Nombre"></input>	
                                <label id="label">Apellido: </label><input type="text" name="apellidoContacto" id="apellido" placeholder="Apellido"></input> <BR/>
                                <label id="label">Teléfono: </label><input type="text" name="telContacto" id="telefono" placeholder="Telefono"></input>
                                <label id="label">Celular: </label><input type="text" name="celContacto" id="celular" placeholder="Celular"></input><BR/>
                                <label id="label">Correo Electronico: </label><input type="text" name="emailContacto" id="email" placeholder="Email"></input> 
                                <label id="label">Cargo: </label><input type="text" name="cargoContacto" id="cargo" placeholder="Cargo"></input><BR/>
                                <label id="label">Fecha de Nacimiento: </label><input type="text" name="fechaNac" id="fechaNac" placeholder="AAAA-MM-DD"></input>     
                    		</div>
                    </div>

                    <div class="form-group">
                    	<div class="col-offsert-sm-2 col-sm-10">
                    		<button type="submit" class="btn btn-primary" value="Guardar">Guardar</button>                    		
                    	</div>
                    </div>
</body>
</html>