
<!DOCTYPE html>
<html>
<head>
	<title>Perfil del Trabajador</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php 
	
	include("conexionSqlsrv.php");
	include("validar.php");

	$validar = new validar;

	$capacidades1 = $_POST['capacidad1'];
	$capacidades2 = $_POST['capacidad2'];
	$capacidades3 = $_POST['capacidad3'];
	$capacidades4 = $_POST['capacidad4'];
	$capacidades5 = $_POST['capacidad5'];
	$dotacion = $_POST['dotacion'];
	$estadoCivil = $_POST['estadoCivil'];
	$estudio = $_POST['estudio'];
	$examMedico1 = $_POST['medico1'];
	$examMedico2 = $_POST['medico2'];
	$examMedico3 = $_POST['medico3'];
	$examMedico4 = $_POST['medico4'];
	$experiencia = $_POST['experiencia'];
	$factRiesgo1 = $_POST['factor1'];
	$factRiesgo2 = $_POST['factor2'];
	$factRiesgo3 = $_POST['factor3'];
	$factRiesgo4 = $_POST['factor4'];
	$factRiesgo5 = $_POST['factor5'];
	$genero = $_POST['genero'];
	$pctRiesgo = $_POST['pctRiesgo'];
	$pruebasPsico1 = $_POST['psico1'];
	$pruebasPsico2 = $_POST['psico2'];
	$pruebasPsico3 = $_POST['psico3'];
	$pruebasTec1 = $_POST['tecnico1'];
	$pruebasTec2 = $_POST['tecnico2'];
	$pruebasTec3 = $_POST['tecnico3'];
	$empresa = $_POST['Empresa'];
	$cargoTM = $_POST['cargo'];
	$estaturaTM = $_POST['estatura'];
	$conocimientosTM = $_POST['conocimiento'];
	$ubicacionTM = $_POST['ciudad'];
	$funcionesTM = $_POST['funcion'];
	$exigenciaFisica = $_POST['exigencia'];
	$observaciones = $_POST['observacion'];
	$intEdad = $_POST['edad'];
	$intExtraversion = $_POST['extroversion'];
	$intReceptividad = $_POST['receptividad'];
	$intAutocontrol = $_POST['autocontrol'];
	$intIndependencia = $_POST['independencia'];
	$intAnsiedad = $_POST['ansiedad'];

	$response = $validar->validarData($_POST);

	if($response){
        echo $validar->showErrors();
    }
    else{
    	$sql = "EXEC SPCagregarPerfilTM '".$capacidades1."','".$capacidades2."','".$capacidades3."','".$capacidades4."','".$capacidades5."','".$dotacion."',
    				'".$estadoCivil."','".$estudio."','".$examMedico1."','".$examMedico2."','".$examMedico3."','".$examMedico4."','".$experiencia."',
    				'".$factRiesgo1."','".$factRiesgo2."','".$factRiesgo3."','".$factRiesgo4."','".$factRiesgo5."','".$genero."','".$pctRiesgo."',
    				'".$pruebasPsico1."','".$pruebasPsico2."','".$pruebasPsico3."','".$pruebasTec1."','".$pruebasTec2."','".$pruebasTec3."',
    				'".$empresa."','".$cargoTM."','".$estaturaTM."','".$conocimientosTM."','".$ubicacionTM."','".$funcionesTM."','".$exigenciaFisica."',
    				'".$observaciones."','".$intEdad."','".$intExtraversion."','".$intReceptividad."','".$intAutocontrol."','".$intIndependencia."',
    				'".$intAnsiedad."'";

    	$stmt =  sqlsrv_query($db, $sql);

    	if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        else {
        	echo "<h4>Guardado con éxito...</h4>";
        }
        sqlsrv_free_stmt($stmt);
    }
    sqlsrv_close($db);
?>
</body>
	<a href="principal.php"><h4>Atrás</h4></a>
</html>