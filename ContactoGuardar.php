<!DOCTYPE html>
<html>
<head>
    <title>Contactos</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php 
	include("conexionSqlsrv.php");
	include("validar.php");

	$validar = new validar;

	$nombre = $_POST['nombreContacto'];
	$apellido = $_POST['apellidoContacto'];
	$telefono =$_POST['telContacto'];
	$celular = $_POST['celContacto'];
	$email = $_POST['emailContacto'];
	$cargo = $_POST['cargoContacto'];
    $fechaNac = $_POST['fechaNac'];

	$response = $validar->validarData($_POST);

	if($response){
        echo $validar->showErrors();
    }
    else{

        $sql="EXEC dbo.SPCagregarContacto ?,?,?,?,?,?,?";
        $params=array($nombre,$apellido,$telefono,$celular,$email,$cargo,$fechaNac);
        $stmt =  sqlsrv_query($db, $sql, $params);
    
        if ($stmt) {
    ?>
            <h4>Guardado con éxito...</h4>
            </br><h4><a href="principal.php">Atrás</h4></a>
        }
        else {
    ?>
            <h3 align="center">Error al guardar Contacto:</h3>
            <h4 align="center">Contacte con el administrador de sistema.</h4></br>
            <a href="principal.php"><h4 align="center">Atrás</h4></a>
    <?php
        }
        sqlsrv_free_stmt($stmt);

        sqlsrv_close($db);
    }

?>
</body>
</html>