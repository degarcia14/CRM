
<!DOCTYPE html>
<html>
<head>
	<title>Solicitud de Personal</title>
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
	<h1>SOLICITUDES DE PERSONAL</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>
  
 	<table class="table table-striped" style="width:1000px;" border="1px" align="center">
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
    <label aligne="center"><h4><?php echo $encab ?> </h4></label>
 		<tr>
 			<th>Solicitud</th>
 			<th>Fecha Solicitud</th>
 			<th>Contacto</th>
 			<th>Cargo</th>
 			<th>Empleados Solicitados</th>
 			<th>Salario</th>
      <th>Bonificaciones</th>
      <th>Riesgo</th>
 			<th>Estado Solicitud</th>
      <th>Fecha Envío Candidatos</th>
      <th>Fecha Respuesta EU</th>
      <th>Fecha de Ingreso</th>
      <th>Modificada</th>
      <th>Modificación</th>
 		</tr>
		<?php 	
 			include("conexionSqlsrv.php");
  			include("validar.php");

  			$validar = new validar;
  			$empresa = $_POST['Empresa'];

  			$sql = "EXEC SPSconsultaSolicitudDePersonal '".$empresa."'";

  			$stmt =  sqlsrv_query($db, $sql);

  			if ($stmt) {
            	$rows = sqlsrv_has_rows($stmt);
	            if ($rows === false) {
    ?>          <h4 align="center">No hay datos</h4>
      <?php
            	}
            	else{
                	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )){?>
                		<tr>
                			<td><?php echo $row['Numero de Solicitud'] ?></td>
                			<td><?php echo $row['Fecha de Solicitud'] ?></td>
                			<td><?php echo $row['Contacto'] ?></td>
                			<td><?php echo $row['Perfil Solicitado'] ?></td>
                			<td><?php echo $row['Cantidad de TM'] ?></td>
                			<td><?php echo $row['Salario'] ?></td>
                      <td><?php echo $row['Bonificaciones'] ?></td>
                      <td><?php echo $row['Porcentaje de Riesgo'] ?></td>
                			<td><?php echo $row['Estado de Solicitud'] ?></td>
                      <td><?php echo $row['Fecha Envio Candidatos']?></td>
                      <td><?php echo $row['Fecha'] ?></td>
                      <td><?php echo $row['Fecha de Ingreso'] ?></td>
                      <td><?php echo $row['Modificada'] ?></td>
                      <td><?php echo $row['Modificacion'] ?></td>
                		</tr>
                	<?php 	
                	}
                }
            }
  		?>
    </table>
  	<a href="principal.php"><h4 align="center">Atrás</h4></a>
</body>
</html>