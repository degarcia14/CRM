<!DOCTYPE html>
<html>
<head>
	<title>Contratos</title>
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
	<h1>CONTRATOS EXISTENTES</h1>
	<div id="topnav">
	<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 	--></div><hr>

 	<table class="table table-striped" style="width:1000px;" align="center" border="1px">
		<tr>
			<th>Contrato Número</th>
			<th>Empresa</th>
			<th>Representante Legal</th>
			<th>Fecha Inicio</th>
			<th>Fecha Final</th>
			<th>Prorroga</th>
			<th>Seguimiento</th>
		</tr>
		<?php 
		
			include("conexionSqlsrv.php");
  			include("validar.php");

  				$validar = new validar;

    			$empresa = $_POST['emp'];
    			$fechaAnio = $_POST['Anio'];
    			$fechaMes = $_POST['Mes'];
    			$fecha = $fechaAnio."-".$fechaMes."-"."1";
    
      			$sql="EXEC SPSconsultaContratoServicio '".$empresa."','".$fecha."'";
   
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
							<td><?php echo $row['Contrato Numero'] ?></td>
							<td><?php echo $row['Empresa'] ?></td>
							<td><?php echo $row['Representante Legal'] ?></td>
							<td><?php echo $row['Fecha Inicio'] ?></td>
							<td><?php echo $row['Fecha Final'] ?></td>
							<td><?php echo $row['Prorroga'] ?></td>
							<td><?php echo $row['strSeguimiento'] ?></td>
						</tr>
		<?php 		}
				}
			}
		?>
	</table>
	<a href="principal.php"><h4 align="center">Atras</h4></a>
</body>
</html>