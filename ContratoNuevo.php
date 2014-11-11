<!DOCTYPE html>
<html>
<head>
   	<title>Generación de Contrato de Servicio</title>
   	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
   	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
   	<h1>SELECCION DE EMPRESA</h1>
   	<!-- <h4>Deben existir los perfiles de la empresa</h4> -->
   	<div id="topnav">
	</div><hr>
   	<form method="POST" id="empresa" action="ContratoGuardarPdf.php" name="empresa">
   		 	<label id="label">Cliente Potencial:</label>
            <select id="emp" name="emp">
                <?php 
                    include("conexionSqlsrv.php");
                    
                    $sqlEmp="SELECT TOP 1000 [idPotencial]
                                ,[strNombre]
                            FROM [tblClientePotencial]
                            ORDER BY [strNombre]";

                    $resultEmp = sqlsrv_query($db,$sqlEmp);
                 
                    if ($resultEmp > 0)
                    {
                        $comboEmp="";
                        while ($row = sqlsrv_fetch_array($resultEmp,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEmp .=" <option value='".$row['idPotencial']."'>".$row['strNombre']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEmp;
                ?>
            </select><br>
            <label id="label">Representante Legal: </label>
                                <select name="repLegal" id="repLegal">
                                    <?php 
                                        include("conexionSqlsrv.php");

                                        $sqlRepLegal="SELECT TOP 1000 [idContacto]
                                                            ,[strNombre]+' '+[strApellido] as 'repLegal'
                                                        FROM [tblContacto]";

                                        $resultRepLegal = sqlsrv_query($db,$sqlRepLegal);
                 
                                        if ($resultRepLegal > 0)
                                        {
                                            $comboRepLgal="";
                                            while ($row = sqlsrv_fetch_array($resultRepLegal,SQLSRV_FETCH_BOTH)) 
                                            {
                                                $comboRepLgal .=" <option value='".$row['idContacto']."'>".$row['repLegal']."</option>"; 
                                            }           
                                        }
                                        else
                                        {
                                            echo "No hubo resultados";
                                        }
                                        sqlsrv_close($db); //cerramos la conexión
                                        echo $comboRepLgal;
                                    ?>
                                </select>
      <label id="label">Cédula Representante Legal: </label><input type="text" id="ccRepLegal" name="ccRepLegal" placeholder="No se lo pude cargar"></input><br>
      <label id="label">Fecha de Inicio:</label><input type="text" id="fecInicio" name="fecInicio" placeholder="AAAA-MM-DD"></input><br>
      <button type="submit" value="Siguiente" class="btn btn-primary">Siguiente</button>
        <!-- <a href="SolicitudPersonalNueva.php">Siguiente</a> -->
	</form>
</body>
</html>