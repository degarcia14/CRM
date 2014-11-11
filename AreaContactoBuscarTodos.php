<!DOCTYPE html>
<html>
<head>
    <title>Contactos</title>
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
	<h1>CONTACTOS EXISTENTES POR AREA Y EMPRESA</h1>
	<div id="topnav">
	<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 	--></div><hr>

 	<table class="table table-striped" style="width:1000px;" align="center" border="1px">
		<tr>
			<th>ID</th>
			<th>ÁREA O DEPARTAMENTO</th>
			<th>CONTACTO</th>
			<th>EMPRESA</th>
		</tr>
		<?php 
		
			include("conexionSqlsrv.php");
    
      			$sql="EXEC SPSconsultarAreaDeContactoTodo";
   
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
							<td><?php echo $row['Departamento'] ?></td>
							<td><?php echo $row['Contacto'] ?></td>
							<td><?php echo $row['Empresa'] ?></td>
						</tr>
		<?php 		}
				}
			}
		//var_dump($stmt);
		?>
	</table>

	<a href="principal.php"><h4 align="center">Atrás</h4></a>
</body>
</html>