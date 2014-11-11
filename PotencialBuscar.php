<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Clientes Potenciales</title>
<!-- 	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
 -->	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
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
	<h1>CLIENTES POTENCIALES</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

 	<table class="table table-striped" style="width:1000px;" border="1px" align="center">
		<tr>
			<th>ID</th>
			<th>NIT</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Correo de Contacto</th>
		</tr>
		<?php 
		
			include("conexionSqlsrv.php");
  			include("validar.php");

  				$validar = new validar;

    			$nit = $_POST['NIT'];
    			$nombre = $_POST['nombre'];   
    
      			$sql="EXEC dbo.SPSconsulaClientePotencial '".$nombre."','".$nit."'";
   
            	$stmt =  sqlsrv_query($db, $sql);
    
        	if ($stmt) {
            	$rows = sqlsrv_has_rows($stmt);
	            if ($rows === false) {
                	echo "No hay datos <BR/>";
            	}
            	else{
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )){ ?>
	                <tr>
						<td><?php echo $row['idPotencial'] ?></td>
						<td><?php echo $row['strNit'] ?></td>
						<td><?php echo $row['strNombre'] ?></td>
						<td><?php echo $row['strDireccion'] ?></td>
						<td><?php echo $row['strTelefono'] ?></td>
						<td><?php echo $row['strCelular'] ?></td>
						<td><?php echo $row['strMailContacto'] ?></td>
					</tr>
				<?php }
				}
			}?>
	</table>
	<a href="principal.php"><h4 align="center">Atrás</h4></a>
</body>
</html>