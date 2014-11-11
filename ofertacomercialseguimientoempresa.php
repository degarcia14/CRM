<html>
<head>
    <title>Seguimiento Oferta Comercial</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>

<body>
    <h1>SEGUIMIENTO OFERTA COMERCIAL</h1>
    <div id="topnav">
            <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 -->
    </div><hr>
        <form method="POST" id="empresa" action="ofertacomercialactualizar.php" name="empresa">
            <label id="label">Oferta:</label>
            <select id="emp" name="emp">
                <option value="0">Nombre empresa - Fecha</option>
                <?php 
                    include("conexionSqlsrv.php");
                    
                    $sqlEmp="SELECT TOP 1000 O.[idOferta]
                                    ,CONVERT(VARCHAR,O.[idOferta],120)+' - '+C.[strNombre]+' - '+CONVERT(VARCHAR,O.[dateFecOferta],120) AS 'Nombre'
                                FROM [dbo].[tblOfertaComercial] O
                                    INNER JOIN dbo.tblClientePotencial C
                                        ON O.intPotencial = C.idPotencial
                            ORDER BY O.[idOferta]";

                    $resultEmp = sqlsrv_query($db,$sqlEmp);
                 
                    if ($resultEmp > 0)
                    {
                        $comboEmp="";
                        while ($row = sqlsrv_fetch_array($resultEmp,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEmp .=" <option value='".$row['idOferta']."'>".$row['Nombre']."</option>"; 
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
            <label id="label">Seguimiento:</label></br>
                <textarea type="text" name="seguimiento" id="seguimiento" placeholder="Fecha y Observaciones"></textarea></br></br>
            <button type="submit" value="Guardar" class="btn btn-primary">Modificar</button>
            <!--<a href="ContratoBuscarTodos.php"><h4>Ver todas las ofertas</h4></a>  no esta creada la clase de ver todas las ofertas comerciales --> 
        </form>     
</body>
</html>