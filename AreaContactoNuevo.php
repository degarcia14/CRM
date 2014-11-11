<html>
<head>
    <title>Contactos</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
    <h1>NUEVA AREA DE CONTACTO</h1><br/>
    <div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

    <form class="form-horizontal" role="form" method="POST" action="AreaContactoGuardar.php">
                    <div class="form-group">
                        <label for="inputRemitente" class="col-sm-2 control-label" id="label"><h4>Datos</h4></label>
                            <div class="col-sm-10">
                                <label for="inputRemitente" class="col-sm-2 control-label" id="label">Empresa:</label>
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
                                <label id="label">Contacto:</label>
                                <select name="Contacto" id="Contacto">
                                    <?php 
                                        include("conexionSqlsrv.php");
                                        $sql="SELECT TOP 1000 [idContacto]
                                                      ,[strNombre]+' '+[strApellido] AS 'Contacto'
                                                      ,[strCargo]
                                                FROM [dbConsola].[dbo].[tblContacto]";
                                        $result = sqlsrv_query($db,$sql);
                                                 
                                        if ($result > 0)
                                        {
                                            $comboContac="";
                                            while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                            {
                                                $comboContac .=" <option value='".$row['idContacto']."'>".$row['Contacto']."</option>"; 
                                            }
                                        }
                                        else
                                        {
                                            echo "No hubo resultados";
                                        }
                                        sqlsrv_close($db); //cerramos la conexión
                                        echo $comboContac;
                                    ?>
                                </select>
                                <label id="label">Área:</label>
                                <select id="Departamento" name="Departamento">
                                    <?php 
                                        include("conexionSqlsrv.php");
                                        $sqlEmp="SELECT TOP 1000 [idDepto]
                                              ,[strDepto]
                                                FROM [tblDepartamento]";
                                        $resultEmp = sqlsrv_query($db,$sqlEmp);
                                     
                                        if ($resultEmp > 0)
                                        {
                                            $comboEmp="";
                                            while ($row = sqlsrv_fetch_array($resultEmp,SQLSRV_FETCH_BOTH)) 
                                            {
                                                $comboEmp .=" <option value='".$row['idDepto']."'>".$row['strDepto']."</option>"; 
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
                                <label id="label">Numero de Cédula: </label><input type="text" id="cedula" name="cedula" placeholder="Solo si es Representante Legal">
                            </div>
                    </div>
<!-- 
                    <div class="form-group">
                        <label for="inputContacto" class="col-sm-2 control-label" id="label">Contacto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombreContacto" id="nombre" placeholder="Nombre"></input> 
                            </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-offsert-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" value="guardar">Guardar</button>                         
                        </div>
                    </div>
</body>
</html>