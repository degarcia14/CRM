<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php 
	include("conexionSqlsrv.php");
	include("validar.php"); 

    $validar = new validar;

	$solicitud = $_POST['solicitud'];
	$trabajadores = $_POST['tm'];
	$conocimientos = $_POST['cextra'];
	$fechaIngreso  = $_POST['fechaIng'];
	$salario = $_POST['salario'];
	$bonificacion = $_POST['bonificacion'];
	$estadoSolicitud = $_POST['estadoSol'];
	$modificacion = $_POST['observacion'];
	$fechaEntrega  = $_POST['fechaEntrega'];

	$response = $validar->validarData($_POST);

	if($response){
        echo $validar->showErrors();
    }
    else{
    	$sql = "EXEC SPUmodificarSolicitudPersonal '".$solicitud."','".$trabajadores."','".$conocimientos."','".$fechaIngreso."',
    		'".$salario."','".$bonificacion."','".$estadoSolicitud."','".$modificacion."','".$fechaEntrega."'";

    	$stmt =  sqlsrv_query($db, $sql);
    
        if ($stmt === false) {
?>
	            <h3>Error en la Modificación...</h3>
	            <h5>Contactar al Administrador de la Aplicación</h5>
				</br><a href="principal.php"><h4 align="center">Atras</h4></a>
<?php
        }
        else{
?>
	            <h3>Modificada con éxito...</h3>
				</br><a href="principal.php"><h4 align="center">Atras</h4></a>
<?php
	    }
        sqlsrv_free_stmt($stmt);	
        sqlsrv_close($db);
    }
?>
</body>
</html>