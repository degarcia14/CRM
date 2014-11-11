<!DOCTYPE html>
<html>
<head>
	<title>Perfil del Trabajador</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>PERFIL EXISTENTE</h1>
    	<div id="topnav">
        <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
        --></div><hr>
    <form method="POST" action="PerfilTMBuscar.php" role="form">
    	<label id="label"><h4>Selección de empresa:</h4></label>
            <select id="empresa" name="empresa">
                <?php 
                    include("conexionSqlsrv.php");
                    include("validar.php");
                    $sqlEmp="SELECT TOP 1000 [lngId]
                          ,[strNombre]
                            FROM [tblEmpUsuaria]
                            ORDER BY [strNombre]";
                            
                    $resultEmp = sqlsrv_query($db,$sqlEmp);
                 
                    if ($resultEmp > 0)
                    {
                        $comboEmp="";
                        while ($row = sqlsrv_fetch_array($resultEmp,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEmp .=" <option value='".$row['lngId']."'>".$row['strNombre']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEmp;
                ?>
            </select><br><br>
            <button type="submit" value="Siguiente" class="btn btn-primary">Siguiente</button>
    </form>
</body>
</html>