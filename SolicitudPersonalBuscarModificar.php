<!DOCTYPE html>
<html>
<head>
	<title>Solicitud de Personal</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>SOLICITUD DE PERSONAL PARA MODIFICAR</h1>
<label id="label"><h4>Diligenciar todos los campos</h4></label>
	
	<div id="topnav">
	<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 	--></div><hr>
 	<?php 
      include("conexionSqlsrv.php");

      $encab = $_POST['Empresa'];

       $sql = "EXEC SPSconsultaEmpresaFT '".$encab."'";

        $stmt = sqlsrv_query($db, $sql);

        if ($stmt) {
          $rows = sqlsrv_has_rows($stmt);
          if ($rows === false) {
            echo "No hay datos <BR/>";
          }
          else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
              
                $encab=$row['strNombre'];
              
            }
          }
        }
    ?>
    <label aligne="center"><h4>EMPRESA: <?php echo $encab ?> </h4></label>
 	<form method="POST" action="SolicitudPersonalModificar.php" id="spmodificar">
 		<label id="label">Seleccione el número de la solicitud:</label>
		 	<select id="solicitud" name="solicitud">
		        <?php 
		            include("conexionSqlsrv.php");
		            include("validar.php");		

		            $empresa = $_POST['Empresa'];		

		            $sqlSolicitud="SELECT TOP 1000 SP.[idSolicitud] as Sol, 
		            						P.CargoTM as car
		  					FROM [tblSolicitudPersonal] SP 
		  						INNER JOIN dbo.tblPerfilTM P
									ON SP.intPerfilTMxEU = P.idPerfilTM
		  						INNER JOIN dbo.tblEmpUsuaria EU
									ON P.empresa = EU.lngId
		 					WHERE EU.lngId = '".$empresa."'";		

		            $resultSolicitud = sqlsrv_query($db,$sqlSolicitud);
		         
		            if ($resultSolicitud > 0)
		            {
		                $comboSolicitud="";
		                while ($row = sqlsrv_fetch_array($resultSolicitud,SQLSRV_FETCH_BOTH)) 
		                {
		                    $comboSolicitud .=" <option value='".$row['Sol']."'>".$row['Sol']." - ".$row['car']."</option>"; 
		                }           
		            }
		            else
		            {
		                $comboSolicitud = "No hay datos";
		            }
		            sqlsrv_close($db); //cerramos la conexión
		            echo $comboSolicitud;
		        ?>
		    </select><br>
		    <label id="label">Nº de Personas:</label><input type="text" name="tm" id="tm" placeholder="Trabajadores Solicitados"><br>
		    <label id="label">Otros Saberes:</label><input type="text" name="cextra" id="cextra" placeholder="Conocimientos Extras"><br>
		    <label id="label">Salario:</label><input type="text" name="salario" id="salario" placeholder="Nuevo Salario Propuesto">
			<label id="label">Bonificaciones:</label><input type="text" name="bonificacion" id="bonificacion" placeholder="Nuevas Bonificaciones"></br>
			<label id="label">Fecha de Respuesta:</label><input type="text" name="fechaEntrega" id="fechaEntrega" placeholder="AAAA-MM-DD">
			<label id="label">Fecha de Ingreso:</label><input type="text" name="fechaIng" id="fechaIng" placeholder="AAAA-MM-DD"><br>
			<label id="label">Estado Solicitud: </label>
			<select type="text" name="estadoSol" id="estadoSol">
			    <?php 
			        include("conexionSqlsrv.php");
			        $sql="SELECT * from tblestadoSolicitud";
			        $result = sqlsrv_query($db,$sql);
			         
			        if ($result > 0)
			        {
			            $comboEstadoSol="";
			            while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
			            {
			                $comboEstadoSol .=" <option value='".$row['idEstadoSol']."'>".$row['strEstadoSol']."</option>"; 
			            }
			        }
			        else
			        {
			            echo "No hubo resultados";
			        }
			        sqlsrv_close($db); //cerramos la conexión
			        echo $comboEstadoSol;
			    ?>
			</select></br>
			<label id="label">Observaciones:</label><br/><textarea id="observacion" name="observacion" placeholder="Detalles de la modificación"></textarea><br>
			<div class="col-sm-offset-2 col-sm-10">
		    	<button type="submit" value="modificar" class="btn btn-primary">Modificar</button>
			</div>
	</form>
	<a href="principal.php"><h4 align="center">Atrás</h4></a>
</body>
</html>