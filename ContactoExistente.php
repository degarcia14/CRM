<html>
<head>
	<title>Contactos</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>CONTACTO EXISTENTE</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

    <form class="form-horizontal" role="form" action="ContactoBuscar.php" method="POST">
                    <!-- <div class="form-group">
                        <label for="inputRemitente" class="col-sm-2 control-label" id="label">Empresa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="remitente" id="remitente" placeholder="Nombre">
                                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Nit">
                            </div>
                    </div> -->

                    <div class="form-group">
                    	<label id="label"><h4>Datos para buscar</h4></label>
                    		<div class="col-sm-10">
                                <label id="label">Nombre: </label><input type="text" name="nombreContacto" id="nombre"></input>	
                                <label id="label">Apellido: </label><input type="text" name="apellidoContacto" id="apellido"></input></br>
                            </div>
                    </div>

                    <div class="form-group">
                    	<div class="col-offsert-sm-2 col-sm-10">
                    		<button type="submit" class="btn btn-primary" value="Buscar">Bucar</button>                    		
                    	</div>
                    </div>
</body>
</html>