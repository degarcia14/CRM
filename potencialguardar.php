
<!DOCTYPE html>
<html>
<head>
    <title>Clientes Potenciales</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php 
	
	include("conexionSqlsrv.php");
    include("validar.php"); 

    $validar = new validar;

    $nit = $_POST['NIT'];
    $nombreE = $_POST['nombre'];   
    $direccionE = $_POST['direccion'];
    $telefonoE = $_POST['telefono'];
    $celularE = $_POST['celular'];
    $mailcontactoE = $_POST['mailcontacto'];
    $actEco = $_POST['actEco'];

    $nombre = $_POST['nombreContacto'];
    $apellido = $_POST['apellidoContacto'];
    $telefono =$_POST['telContacto'];
    $celular = $_POST['celContacto'];
    $email = $_POST['emailc'];
    $cargo = $_POST['cargoContacto'];
    $fechaNac = $_POST['fechaNac'];

    $response = $validar->validarData($_POST);  
    
    if($response){
    ?>
        <h3 align="center"><?php echo $validar->showErrors(); ?></h3>
        <a href="principal.php"><h4 align="center">Atras</h4></a>
    <?php
    }
    else{

        $sql="EXEC dbo.SPCagregaClientePotencial '".$nit."','".$nombreE."','".$direccionE."','".$telefonoE."','".$celularE."','".$mailcontactoE."','".$actEco."'";
        //$params=array($nit,$nombre,$direccion,$telefono,$celular,$mailcontacto,$actEco);
        $stmt =  sqlsrv_query($db,$sql);
        
        if ($stmt) {
    ?>
            <h4>Empresa guardada con éxito...</h4>   
    <?php
        }
        else {
    ?>
            <h3 align="center">Error al guardar Cliente Potencial:</h3>
            <h4 align="center">Contacte con el administrador de sistema.</h4></br>
    <?php
        }

        $sql="EXEC dbo.SPCagregarContacto ?,?,?,?,?,?,?";
        $params=array($nombre,$apellido,$telefono,$celular,$email,$cargo,$fechaNac);
        $stmt =  sqlsrv_query($db, $sql, $params);
    
        if ($stmt) {
    ?>
            <h4>Contacto guardado con éxito...</h4>
    <?php       
        }
        else {
    ?>
            <h3 align="center">Error al guardar Contacto:</h3>
            <h4 align="center">Contacte con el administrador de sistema.</h4></br>
    <?php
        }
        sqlsrv_free_stmt($stmt);

        sqlsrv_close($db);
    }
?>
</br><a href="principal.php"><h4>Atrás</h4></a>
</body>
</html>