
<!DOCTYPE html>
<html>
<head>
	<title>Solicitud de Personal Existente</title>
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
	<h1>TODAS LAS SOLICITUDES DE PERSONAL</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>
  
 	<table class="table table-striped" style="width:1     f00px;" border="1px" align="center">
   
 		<tr>
 			<th>Solicitud</th>
 			<th>Fecha Solicitud</th>
 			<th>Empresa</th>
 			<th>Contacto</th>
 			<th>Cargo</th>
 			<th>Empleados Solicitados</th>
 			<th>Fecha de Ingreso TM y Cierre</th>
 			<th>Salario</th>
      <th>Bonificaciones</th>
      <th>Riesgo</th>
 			<th>Estado Solicitud</th>
      <th>Modificada</th>
      <th>Modificación</th>
 		</tr>
		<?php 	
 			include("conexionSqlsrv.php");
  			include("validar.php");

  			$validar = new validar;
  			//$empresa = $_POST['Empresa'];

  			$sql = "EXEC SPSconsultaSolicitudDePersonalTodas";
        //var_dump($sql);
  			$stmt =  sqlsrv_query($db, $sql);
        //var_dump($stmt);
        //$rowValidar = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
  			if ($stmt === false) {
    ?>          <h4 align="center">No hay datos</h4>
      <?php
        }
        else{
         	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )){?>
                		<tr>
                			<td><?php echo $row['Numero de Solicitud'] ?></td>
                			<td><?php echo $row['Fecha de Solicitud'] ?></td>
                			<td><?php echo $row['Empresa'] ?></td>
                			<td><?php echo $row['Contacto'] ?></td>
                			<td><?php echo $row['Perfil Solicitado'] ?></td>
                      <td><?php echo $row['Cantidad de TM'] ?></td>
                			<td><?php echo $row['Fecha de Ingreso'] ?></td>
                			<td><?php echo $row['Salario'] ?></td>
                      <td><?php echo $row['Bonificaciones'] ?></td>
                      <td><?php echo $row['Porcentaje de Riesgo'] ?></td>
                			<td><?php echo $row['Estado de Solicitud'] ?></td>
                      <td><?php echo $row['Modificada'] ?></td>
                      <td><?php echo $row['Modificacion'] ?></td>
                		</tr>
                	<?php 	
         	}
        }
      ?>
    </table>
  	<a href="principal.php"><h4 align="center">Atras</h4></a>
</body>
</html>