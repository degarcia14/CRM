<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Contrato</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php 
	include("conexionSqlsrv.php");
	include("validar.php");

	$validar = new validar;

	$empresa = $_POST['emp'];
    $estado = $_POST['estado'];
	$seguimiento = $_POST['seguimiento'];

	$response = $validar->validarData($_POST);

	if($response){
        echo $validar->showErrors();
    }
    else{

        $sql="EXEC SPUmodificarSeguimientoContrato '".$empresa."','".$estado."','".$seguimiento."'";
        //$params=array($empresa,$estado,$seguimiento);
        $stmt =  sqlsrv_query($db, $sql);
    
        if ($stmt) {
    ?>
            <h4>Seguimiento guardado con éxito...</h4>
            </br><h4><a href="principal.php">Atras</h4></a>
    <?php   
            /*$newURL="principal.php?Guardado=ok";
            header('Location: '.$newURL); */ 
        }
        else {
    ?>
            <h3 align="center">Error al guardar seguimiento.</h3>
            <h4 align="center">Contacte con el administrador de sistema.</h4></br>
            <a href="principal.php"><h4 align="center">Atras</h4></a>
    <?php
        }
        //sqlsrv_free_stmt($stmt);

        sqlsrv_close($db);
    }

?>
</body>
</html>