<!DOCTYPE html>
<html>
<head>
	<title>Oferta Comercial Existente</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<style>
		tr:hover td{
			background-color: #CCC  !important
		}
		td{
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>OFERTA COMERCIAL</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

 	<table class="table table-striped" style="width:1000px;" align="center" border="1px">
 		<tr>
			<th>OFERTA</th>
 			<th>REPRESENTANTE O CONTACTO</th>
 			<th>EMPRESA</th>
 			<th>FECHA</th>
 			<th>TRABAJADORES</th>
 			<th>SALARIO</th>
 			<th>DESCRIPCIÓN</th>
 			<th>RIESGO</th>
 			<th>SEGUIMIENTO</th>
 		</tr>
 		<?php 	
 			include("conexionSqlsrv.php");
  			include("validar.php");

  			$validar = new validar;

  			$empresa = $_POST['nombre'];
  			$nit = $_POST['NIT'];
  			$contacto = $_POST['replegal'];
  			$fechaMes = $_POST['Mes'];
  			$fechaAnio = $_POST['Anio'];
  			$fecha = $fechaAnio."-".$fechaMes."-"."1";

  			$response=$validar->limpiarCadena($_POST);

  			// $sql="EXEC dbo.SPSconsultaOfertaComercial '".$empresa."','".$nit."',''".$contacto."'";
  			$sql = "EXEC dbo.SPSconsultaOfertaComercial '".$empresa."','".$nit."','".$contacto."','".$fecha."'";
						
  			$stmt =  sqlsrv_query($db, $sql);

  			if ($stmt) {
            	$rows = sqlsrv_has_rows($stmt);
	            if ($rows === false) {
                	echo "No hay datos <BR/>";
            	}
            	else{
                	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )){ ?>
                		<tr>
							<td><?php echo $row['idOferta'] ?></td>
							<td><?php echo $row['Contacto'] ?></td>
							<td><?php echo $row['Empresa'] ?></td>
							<td><?php echo $row['Fecha'] ?></td>
							<td><?php echo $row['intNroTM'] ?></td>
							<td><?php echo $row['intSalarioBase'] ?></td>
							<td><?php echo $row['strObjetoOferta'] ?></td>
							<td><?php echo $row['Riesgo'] ?></td>
							<td><?php echo $row['strSeguimiento'] ?></td>
						</tr>
				<?php }
				}
			}
        ?>
    </table>
    <a href="principal.php"><h4 align="center">Atrás</h4></a>
</body>
</html>