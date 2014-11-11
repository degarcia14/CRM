<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body align="center">
    <?php

        include("saConexionSqlsrv.php");
        include("saValidar.php");     

        $validar = new saValidar; 

        $usuario = $_POST['usuario'];
        $pwd = $_POST['contrasena'];       

        
        $response = $validar->validarData($_POST);      

        if($response){
    ?>
        <h4 align="center"><?php echo $validar->showErrors(); ?></h4>
    <?php
        }
        else{   

            $sql="EXEC dbo.SPSautenticarUsuario '".$usuario."','".$pwd."'";
       
                $stmt =  sqlsrv_query($db, $sql);
        
            if ($stmt === false) {
                
            }
            while($row = sqlsrv_fetch_array($stmt)) {
                header("Location:principal.php");
            }
            sqlsrv_free_stmt($stmt);    

            sqlsrv_close($db);
        }
    ?>
    <a href="login.php"><h4 align="center">Atras</h4></a>
</body>
</html>