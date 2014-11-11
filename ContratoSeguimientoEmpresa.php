<html>
<head>
    <title>Seguimiento Contrato</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>

<body>
    <h1>SEGUIMIENTO CONTRATO DE SERVICIOS</h1>
    <div id="topnav">
            <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a> -->
    </div><hr>
        <form method="POST" id="empresa" action="contratoActualizar.php" name="empresa">
            <label id="label">Contrato:</label>
            <select id="emp" name="emp">
                <option value="0">Empresa - Fecha</option>
                <?php 
                    include("conexionSqlsrv.php");
                    
                    $sqlEmp="SELECT TOP 1000 CO.[idContrato] AS 'Contrato' 
                                    ,C.[strNombre]+' - '+CONVERT(VARCHAR,CO.[dateFecInicio],120) AS 'Nombre'
                            FROM [dbo].[tblContrato] CO
                                INNER JOIN dbo.tblClientePotencial C
                                    ON CO.idContrato = C.idPotencial
                            ORDER by dateFecInicio";

                    $resultEmp = sqlsrv_query($db,$sqlEmp);
                 
                    if ($resultEmp > 0)
                    {
                        $comboEmp="";
                        while ($row = sqlsrv_fetch_array($resultEmp,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEmp .=" <option value='".$row['Contrato']."'>".$row['Nombre']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEmp;
                ?>
            </select>
            <label id="label">Estado Contrato: </label>
            <select type="text" name="estado" id="estado">
                <?php 
                    include("conexionSqlsrv.php");
                    $sql="SELECT * from tblestadoContrato";
                    $result = sqlsrv_query($db,$sql);
                     
                    if ($result > 0)
                    {
                        $comboEstadoSol="";
                        while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEstadoSol .=" <option value='".$row['idEstadoCon']."'>".$row['strEstadoCon']."</option>"; 
                        }
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEstadoSol;
                ?>
            </select></br>
            <label id="label">Seguimiento:</label></br>
                <textarea type="text" name="seguimiento" id="seguimiento" placeholder="Fecha y Observaciones"></textarea></br></br>
            <button type="submit" value="Guardar" class="btn btn-primary">Modificar</button>
            <a href="ContratoBuscarTodos.php"><h4>Ver todos los contratos</h4></a>  
        </form>     
</body>
</html>