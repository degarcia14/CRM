<html>
<head>
	<title>Oferta Comercial Existente</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>BUSCAR OFERTA COMERCIAL</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

 	<form method="POST" id="potencial" action="ofertaComerciaBuscar.php">

                    <div class="form-group">
                        <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>Datos Empresa Destinataria</h3></label>
                            <div class="col-sm-10">
                                <label id="label">NIT: </label><input type="text" name="NIT" placeholder="nit">
                                <label id="label">Nombre Empresa: </label><input type="text" name="nombre" placeholder="Nombre EU"><br/>
                                <label id="label">Representante Legal: </label><input type="text" name="replegal" placeholder="Rep Legal o Contacto">
                                <label id="label">Fecha de Oferta: </label>
                                <select name="Mes" id="Mes" class="texto1">
                                    <option value="0">Mes</option>
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Octubre</option>
                                    <option value="10">Septiembre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                                <select name="Anio" id="Anio" class="texto1">
                                    <option value="0">Año</option>
                                    <?php for ($i=2014;$i<=2100;$i++){
                                    echo "<option value=$i>$i</option>";
                                    } ?>
                                </select> 
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