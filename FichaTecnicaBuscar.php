<!DOCTYPE html>
<html>
<head>
	<title>Ficha Tecnica EU</title>
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
<h1>FICHA TÉCNICA DE EMPRESA USUARIA</h1>
	<div id="topnav">
		<!--<?php //echo $_SESSION['usuario'] ?>| --><a href="login.php"><?php //session_destroy() ?>Salir</a>
	</div><hr>

	<table class="table table-striped" style="width:1000px;" border="1px" align="center">
		<?php 
			include("conexionSqlsrv.php");

			$encab = $_POST['emp'];

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

 		<label aligne="center"><h4><?php echo $encab ?> </h4></label>

 		<tr>
 			<th>ID</th>
 			<th>NIT</th>
 			<th>PBX</th>
 			<th>DIRECCÓN</th>
 			<th>CIUDAD</th>
 			<th>NÓMINA</th>
 		</tr>

      	<?php
 			include("conexionSqlsrv.php");
 			include("validar.php");

 			$validar = new validar;

  			$empresa = $_POST['emp'];

  			$sql = "EXEC SPSconsultaEmpresaFT '".$empresa."'";

  			$stmt = sqlsrv_query($db, $sql);

  			if ($stmt) {
  				$rows = sqlsrv_has_rows($stmt);
  				if ($rows === false) {
  					echo "No hay datos <BR/>";
  				}
  				else {
	  				while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {?>
	  					<tr>
	  						<td><?php echo $row['lngId'] ?></td>
	  						<td><?php echo $row['strTercero'] ?></td>
	  						<td><?php echo $row['strTelefono'] ?></td>
	  						<td><?php echo $row['strDireccion'] ?></td>
	  						<td><?php echo $row['strCiudad'] ?></td>
	  						<td><?php echo $row['strGrupoNomina'] ?></td>
	  					</tr><?php
	  				}
  				}		
  			}
 		?>
 	</table></br>
  
 	<table class="table table-striped" style="width:1000px;" border="1px" align="center">
 		<label aligne="center"><h4>CONTACTOS</h4></label>	
 		<tr>
 			<th>ID ÁREA</th>
 			<th>CONTACTO</th>
 			<th>ÁREA</th>
 			<th>CARGO</th>
 			<th>EXTENSIÓN O TELÉFONO</th>
 			<th>CELULAR</th>
      		<th>CORREO ELECTRÓNICO</th>
      	</tr>

      	<?php
 			include("conexionSqlsrv.php");

 			$validar = new validar;

  			$empresa = $_POST['emp'];

  			$sql = "EXEC SPSconsultaContactosFT '".$empresa."'";

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
	  						<td><?php echo $row['Id Area'] ?></td>
	  						<td><?php echo $row['Contacto'] ?></td>
	  						<td><?php echo $row['Area'] ?></td>
	  						<td><?php echo $row['Cargo'] ?></td>
	  						<td><?php echo $row['Telefono'] ?></td>
	  						<td><?php echo $row['Celular'] ?></td>
	  						<td><?php echo $row['Email'] ?></td>
	  					</tr><?php
	  				}
  				}		
  			}
 		?>
 	</table></br>

 	<table class="table table-striped" style="width:1000px;" border="1px" align="center">
 		<label aligne="center"><h4>PERFILES</h4></label>
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

 			$validar = new validar;
  			$empresa = $_POST['emp'];

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
 	<a href="principal.php"><h4 align="center">Atras</h4></a>
</body>
</html>