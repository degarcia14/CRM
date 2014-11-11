<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="menu.css" />
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body align="center">
    <?php

        include("conexionSqlsrv.php");
        include("validar.php");     

        $validar = new validar; 

        //$usuarioL = $_POST['usuario'];
        //$pwdL = $_POST['contrasena'];       

        $usuario = $validar->limpiarCadena($_POST['usuario']);
        $pwd = $validar->limpiarCadena($_POST['contrasena']);
        //$mensaje .= "ERROR DE AUTENTICACION: </br>
          //          Nombre de usuario y/o Contraseña Invalido.";

        $response = $validar->validarData($_POST);      

        if($response){
    ?>
            <h3 align="center"><?php echo $validar->showErrors(); ?></h3>
            <a href="login.php"><h4 align="center">Atras</h4></a>
    <?php
        }
        else{   

            $sql="EXEC dbo.SPSautenticarUsuario ?,?"; //'".$usuario."','".$pwd."'";
            $param = array($usuario,$pwd);
       
            $stmt = sqlsrv_query($db3, $sql, $param);
            
            if ($row = sqlsrv_fetch_array($stmt)) {
                header("Location:principal.php");
            }
            else{
    ?>
                <h3 align="center">Error de autenticacion:</h3>
                <h4 align="center">Usuario y/o contraseña equivocado, por favor confirmar.</h4></br>
                <a href="login.php"><h4 align="center">Atrás</h4></a>
    <?php
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($db);
        }
    ?>
</body>
</html>

