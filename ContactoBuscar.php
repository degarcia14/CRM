<!DOCTYPE html>
<html>
<head>
	<title>Clientes Potenciales</title>
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
	<h1>CONTACTOS EXISTENTES</h1>
	<div id="topnav">
	<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 	--></div><hr>

 	<table class="table table-striped" style="width:1000px;" align="center" border="1px">
		<tr>
			<th>ID</th>
			<th>CONTACTO</th>
			<th>TELÉFONO</th>
			<th>CELULAR</th>
			<th>CORREO</th>
			<th>CARGO</th>
			<th>FECHA DE NACIMIENTO</th>
		</tr>
		<?php 
		
			include("conexionSqlsrv.php");
  			include("validar.php");

  				$validar = new validar;

    			$nombre = $_POST['nombreContacto'];
    			$apellido = $_POST['apellidoContacto'];
    
      			$sql="EXEC SPSconsultarContacto '".$nombre."','".$apellido."'";
   
            	$stmt =  sqlsrv_query($db, $sql);
    
        	if ($stmt) 
        	{
            	$rows = sqlsrv_has_rows($stmt);
	            if ($rows === false) 
	            {
                	echo "No hay datos <BR/>";
            	}
            	else
            	{
                	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
                	{
        ?>
	                	<tr>
							<td><?php echo $row['Id'] ?></td>
							<td><?php echo $row['Contacto'] ?></td>
							<td><?php echo $row['Telefono'] ?></td>
							<td><?php echo $row['Celular'] ?></td>
							<td><?php echo $row['Correo'] ?></td>
							<td><?php echo $row['Cargo'] ?></td>
							<td><?php echo $row['Fecha'] ?></td>
						</tr>
		<?php 		}
				}
			}
		?>
	</table>
	<a href="principal.php"><h4 align="center">Atrás</h4</a>
</body>
</html>