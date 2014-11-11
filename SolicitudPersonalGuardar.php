<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Solicitud de Personal</title>
</head>
<body>
<?php 

	include("conexionSqlsrv.php");
    include("validar.php"); 

    //var_dump($_POST);
    $validar = new validar;

	$FecSolicitud = $_POST['fechaSolicitud'];
	$Solicitante = $_POST['Contacto'];
	$NoTMSolicitado = $_POST['tm'];
	$TMxEmpUsuaria = $_POST['enviado'];	
	$VinculacionDirecta = $_POST['Vinculacion'];
	$OtrosConocimientos = $_POST['cextra'];
	$FecIngreso = $_POST['fechaIng'];
	$Salario = $_POST['salario'];
	$Jornada = $_POST['jornada'];
	$TipoJornada = $_POST['tjornada'];
	$Bonificaciones = $_POST['bonificacion'];
	$Proceso = $_POST['Seleccion'];
	$PerfilTM = $_POST['Perfil'];
	
		
	$response = $validar->validarData($_POST);

    if($response){
        echo $validar->showErrors();
    }
    else{	
        $sql="EXEC SPCagregarSolicitudDePersonal '".$FecSolicitud."','".$Solicitante."','".$NoTMSolicitado."','".$TMxEmpUsuaria."','".$VinculacionDirecta."',
        		'".$OtrosConocimientos."','".$FecIngreso."','".$Salario."','".$Jornada."','".$TipoJornada."','".$Bonificaciones."','".$Proceso."','".$PerfilTM."'";
   
        $stmt =  sqlsrv_query($db, $sql);
    
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        else{
	        echo "<h3>Guardado con éxito...</h3>";
	    }
        sqlsrv_free_stmt($stmt);	
        sqlsrv_close($db);
    }
?>
</body>
	</br><a href="principal.php"><h4 align="center">Atrás</h4></a>
</html>