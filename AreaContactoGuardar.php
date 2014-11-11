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

	$empresa = $_POST['Empresa'];
    $contacto = $_POST['Contacto'];
    $depto = $_POST['Departamento'];
    $cedula = $_POST['cedula'];

    //echo $validar->showErrors();

	$sqlValidar = "EXEC SPSconsultarAreaDeContactoExistente ?,?,?";
    $paramsValidar = array($empresa,$contacto,$depto);
    $stmtValidar = sqlsrv_query($db,$sqlValidar,$paramsValidar);
    $rowValidar = sqlsrv_fetch_array($stmtValidar,SQLSRV_FETCH_BOTH);
    
	if($rowValidar['Depto'] == $depto){    
?>
        <h3 align="center">Área ya asignada...</h3>
        <a href="principal.php"><h4 align="center">Atrás</h4></a>
<?php
        sqlsrv_free_stmt($stmtValidar);
        
    }
    else{

        $sql="EXEC dbo.SPCagregarAreaDeContacto ?,?,?,?";

        $params = array($empresa,$contacto,$depto,$cedula);
   
        $stmt =  sqlsrv_query($db, $sql, $params);
    
        if ($stmt) {
?>  
            <h3 align="center">Asignado con éxito...</h3>
            <a href="principal.php"><h4 align="center">Atrás</h4></a>       
<?php
         }
        else {
?>
            <h3 align="center">Error en la asignacion de área...</h3>
            <a href="principal.php"><h4 align="center">Atrás</h4></a>
<?php
        }
        sqlsrv_free_stmt($stmt);
    }
    sqlsrv_close($db);
?>    
</body>
</html>