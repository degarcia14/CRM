<html>
<head>
	<title>Solicitud de Personal</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>SOLICITUD DE PERSONAL EXISTENTE</h1>
	<div id="topnav">
<!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 --></div><hr>

	<form method="post" id="potencial" action="SolicitudPersonalBuscar.php">
       <div class="form-group">
           <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>Seleccione la Empresa:</h3></label>
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
                    </select>
                </div>
       </div><br>
       <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" value="ingresar" class="btn btn-primary">Consultar</button>
               <a href="SolicitudPersonalBuscarTodas.php"><h4 align="center">Ver todas las solicitudes</h4></a>
            </div>
        </div>
    </form> 
</body>
</html>