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

 	<form method="post" id="potencial" action="potencialguardar.php">

                    <div class="form-group">
                        <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>Datos de la empresa</h3></label>
                            <div class="col-sm-10">
                                <label id="label">NIT: </label><input type="text" name="NIT" placeholder="nit">
                                <label id="label">Nombre Empresa: </label><input type="text" name="nombre" placeholder="Nombre EU"><br/>
                                <label id="label">Dirección: </label><input type="text" name="direccion" placeholder="Dirección">
                                <label id="label">Teléfono: </label><input type="text" name="telefono" placeholder="Telefono"><br/>
                                <label id="label">Celular: </label><input type="text" name="celular" placeholder="celular">
                                <label id="label">Correo Empresarial: </label><input type="text" name="mailcontacto" placeholder="Correo electronico"><br/>
                                <label id="label">Actividad Económica: </label>
                                    <select name="actEco">
                                        <?php 
                                            include("conexionSqlsrv.php");
                                            include("validar.php");

                                            $sqlActEco = "SELECT TOP 1000 [IdCodigo]
                                                            ,[strDescripcion]
                                                        FROM [tCOActividadesEconomicas]";

                                            $resultActEco = sqlsrv_query($db2, $sqlActEco);

                                            if ($resultActEco > 0)
                                            {
                                                $comboActEco="";
                                                while ($row = sqlsrv_fetch_array($resultActEco,SQLSRV_FETCH_ASSOC)) 
                                                {
                                                    $comboActEco .=" <option value='".$row['IdCodigo']."'>".$row['strDescripcion']."</option>"; 
                                                }           
                                            }
                                            else
                                            {
                                                echo "No hubo resultados";
                                            }
                                            sqlsrv_close($db2); //cerramos la conexión
                                            echo $comboActEco;
                                        ?>
                                    </select></br>
                            </div>
                    </div></br>

                    <div class="form-group">
                        <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>Datos del contacto inicial</h3></label>
                            <div class="col-sm-10">
                                <label id="label">Nombre: </label><input type="text" name="nombreContacto" id="nombreC" placeholder="Nombre"></input>    
                                <label id="label">Apellido: </label><input type="text" name="apellidoContacto" id="apellidoC" placeholder="Apellido"></input> <BR/>
                                <label id="label">Telefono: </label><input type="text" name="telContacto" id="telefonoC" placeholder="Telefono"></input>
                                <label id="label">Celular: </label><input type="text" name="celContacto" id="celularC" placeholder="Celular"></input><BR/>
                                <label id="label">Correo Electrónico: </label><input type="text" name="emailc" placeholder="Email"></input> 
                                <label id="label">Cargo: </label><input type="text" name="cargoContacto" id="cargoC" placeholder="Cargo"></input><BR/>
                                <label id="label">Fecha de Nacimiento: </label><input type="text" name="fechaNac" id="fechaNac" placeholder="AAAA-MM-DD"></input>     
                            </div>
                    </div></br>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" value="ingresar" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

    </form> 
</body>
</html>