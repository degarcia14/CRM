<html>
<head>
    <title>Contactos</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
    <h1>BUSCAR AREA DE CONTACTO</h1>
    <div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

    <form class="form-horizontal" role="form" action="AreaContactoBuscar.php" method="POST">
                    <div class="form-group">
                        <label for="inputRemitente" class="col-sm-2 control-label" id="label"><h4>Empresa</h4></label>
                            <div class="col-sm-10">
                                <select id="Empresa" name="Empresa">
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
                            </div>
                    </div>
                        <div>
                            <button type="submit" class="btn btn-primary" value="Buscar">Buscar</button>
                            <a href="AreaContactoBuscarTodos.php"><h4>Ver todas las areas</h4></a>                       
                        </div>
                    </div>
</body>
</html>