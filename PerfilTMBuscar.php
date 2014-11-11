<!DOCTYPE html>
<html>
<head>
	<title>Perfil del Trabajador</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
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
<h1>PERFIL DEL TRABAJADOR</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>
 	<?php 
			include("conexionSqlsrv.php");

			$encab = $_POST['empresa'];

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

 		<label aligne="center"><h4>EMRESA: <?php echo $encab ?> </h4></label>
  
 	<table class="table table-striped" style="width:1000px;" border="1px" align="center">
 		<tr>
 			<th>PERFIL NRO</th>
 			<th>CARGO</th>
 			<th>GÉNERO</th>
 			<th>% RIESGO</th>
 			<th>DOTACIÓN</th>
 			<th>ESTUDIO</th>
 			<th>EXPERIENCIA</th>
      		<th>EDAD</th>
      		<th>ESTADO CIVIL</th>
 			<th>CAPACIDADES</th>
 			<th>EXÁMENES MÉDICOS</th>
 			<th>RIESGOS</th>
 			<th>PRUEBAS PSICOLÓGICAS</th>
 			<th>PRUEBAS TÉCNICAS</th>
 		</tr>
 		<?php
 			include("conexionSqlsrv.php");
 			include("validar.php");
 			
 			$validar = new validar;
  			$empresa = $_POST['empresa'];

  			$sql = "EXEC SPSconsultarPerfilTM '".$empresa."'";

  			$stmt = sqlsrv_query($db, $sql);

  			if ($stmt) {
  				$rows = sqlsrv_has_rows($stmt);
  				if ($rows === false) {
  		?>			<h4 align="center">No hay datos</h4>
  		<?php
  				}
  				else {
	  				while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {?>
	  					<tr>
	  						<td><?php echo $row['Perfil Nro'] ?></td>
	  						<td><?php echo $row['Cargo'] ?></td>
	  						<td><?php echo $row['Genero'] ?></td>
	  						<td><?php echo $row['% Riesgo'] ?></td>
	  						<td><?php echo $row['Dotacion'] ?></td>
	  						<td><?php echo $row['Estudio'] ?></td>
	  						<td><?php echo $row['Experiencia'] ?></td>
	  						<td><?php echo $row['Edad'] ?></td>
	  						<td><?php echo $row['Estado Civil'] ?></td>
	  						<td><?php echo $row['Capacidades'] ?></td>
	  						<td><?php echo $row['Examenes Medicos'] ?></td>
	  						<td><?php echo $row['Riesgos'] ?></td>
	  						<td><?php echo $row['Pruebas Psicologicas'] ?></td>
	  						<td><?php echo $row['Pruebas Tecnicas'] ?></td>
	  					</tr><?php
	  				}
  				}
  			}
 		?>
 	</table>
</body>
	<a href="principal.php"><h4 align="center">Atrás</h4></a>
</html>