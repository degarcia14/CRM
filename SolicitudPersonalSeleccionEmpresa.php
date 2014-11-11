<!DOCTYPE html>
<html>
<head>
   	<title>Solicitud de Personal</title>
   	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
   	<h1>SOLICITUD DE PERSONAL</h1>
   	<h4>Deben existir los perfiles de la empresa</h4>
   	<div id="topnav">
	</div><hr>
   	<form method="POST" id="empresa" action="SolicitudPersonalNueva.php" name="empresa">
   		 	<label id="label">Empresa Solicitante:</label>
            <select id="emp" name="emp">
                <?php 
                    include("conexionSqlsrv.php");
                    
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
        <!-- <a href="SolicitudPersonalNueva.php">Siguiente</a> -->
	</form>
</body>
</html>