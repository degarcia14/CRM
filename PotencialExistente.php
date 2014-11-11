<html>
<head>
	<title>Clientes Potenciales</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>CLIENTES POTENCIALES</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

 	<form method="post" id="potencial" action="potencialbuscar.php">

                    <div class="form-group">
                        <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>Datos para buscar la empresa</h3></label>
                            <div class="col-sm-10">
                                <label id="label">Nombre Empresa: </label><input type="text" name="nombre" placeholder="Nombre EU">
                                <label id="label">NIT: </label><input type="text" name="NIT" placeholder="nit">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" value="buscar" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>

    </form> 
</body>
</html>