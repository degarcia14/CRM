    <!DOCTYPE html>
    <html>
    <head>
    	<title>Solicitud de Personal</title>
    	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <?php 
        //    include("conexionSqlsrv.php");
//            include("validar.php");
//            var_dump($empresa=$_POST['emp']);
        ?>
    </head>
    <body>
    	<h1>SOLICITUD DE PERSONAL</h1>
    	<div id="topnav">
    </div><hr>
        <?php 
            include("conexionSqlsrv.php");

            $encab = $_POST['emp'];

             $sql = "EXEC SPSconsultaEmpresaFT '".$encab."'";

            $stmt = sqlsrv_query($db, $sql);

            if ($stmt) {
                $rows = sqlsrv_has_rows($stmt);
                if ($rows === false) {
                    echo "No hay datos <BR/>";
                }
                else {
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        
                            $encab=$row['strNombre'];
                        
                    }
                }
            }
        ?>

     	<form method="POST" id="Solicitud" action="SolicitudPersonalGuardar.php">
            <div class="form-group">
                <label id="label"><h3>1. EMPRESA: <?php echo $encab ?></h3></label>
                    <div class="col-sm-10">
                        <label id="label">Perfil Solicitado:</label>
                            <select id="Perfil" name="Perfil">
                                <?php 
                                    include("conexionSqlsrv.php");
                                    
                                    $empresa = $_POST['emp'];
                                    
                                    $sqlPerfil="SELECT TOP 1000 [idPerfilTM]
                                                ,[cargoTM]
                                            FROM [tblPerfilTM]
                                            WHERE empresa = '".$empresa."'";                                    

                                    $resultPerfil = sqlsrv_query($db,$sqlPerfil);
                                 
                                    if ($resultPerfil > 0)
                                    {
                                        $comboPerfil="";
                                        while ($row = sqlsrv_fetch_array($resultPerfil,SQLSRV_FETCH_BOTH)) 
                                        {
                                            $comboPerfil .=" <option value='".$row['idPerfilTM']."'>".$row['cargoTM']."</option>"; 
                                        }           
                                    }
                                    else
                                    {
                                        echo "No hubo resultados";
                                    }
                                    sqlsrv_close($db); //cerramos la conexión
                                    echo $comboPerfil;
                                ?>
                            </select>
                        <label id="label">Solicitante:</label>
                            <select type="text" name="Contacto" id="Contacto">
                                <?php 
                                    include("conexionSqlsrv.php");                                  
                                    $empresa = $_POST['emp'];
                                    $sql="SELECT TOP 1000 c.idContacto as Id
                                              ,(c.strNombre+' '+c.strApellido) as Contacto
                                          FROM [tblArea] A INNER JOIN tblDepartamento d
                                            ON A.INTDEPTO = d.IDDEPTO
                                          INNER JOIN tblContacto c
                                            ON a.intContacto = c.idContacto
                                          INNER JOIN dbo.tblEmpUsuaria eu
                                            ON a.intEmpUsuaria = eu.lngId
                                          WHERE eu.lngId = '".$empresa."'";

                                    $result = sqlsrv_query($db,$sql);
                                             
                                    if ($result > 0)
                                    {
                                        $comboContac="";
                                        while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                        {
                                            $comboContac .=" <option value='".$row['Id']."'>".$row['Contacto']."</option>"; 
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
                        <label id="label">Fecha Solicitud:</label><input type="text" name="fechaSolicitud" id="fechaSolicitud" placeholder="AAAA-MM-DD"></br>
                    </div>
                <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>2. Requisitos Generales</h3></label>
                <div class="form-group">
                    <div class="col-sm-10">
                        <label id="label">Nº de Personas:</label><input type="text" name="tm" id="tm" placeholder="Trabajadores Solicitados"></br>
                        <label id="label">Enviado:</label>    
                            <select name="enviado" id="enviado">
                                <option value="S">Si</option>
                                <option value="N">No</option>
                            </select>
                        <label id="label">Vinculación Directa:</label>
                            <select name="Vinculacion" id="Vinculacion">
                                <option value="S">Si</option>
                                <option value="N">No</option>
                            </select>
                        <label id="label">Proceso de Selección:</label>
                            <select name="Seleccion" id="Seleccion">
                                <option value="S">Si</option>
                                <option value="N">No</option>
                            </select></br>
                    </div>
                <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3> 3. Educación y Experiencia</h3></label>    
                <div class="col-sm-10">
                    <label id="label">Otros Saberes:</label></br>
                    <textarea type="" name="cextra" id="cextra" placeholder="Conocimientos Extras"></textarea>
                </div>
                <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>5. Requsitos para Contratación</h3></label>
                <div class="col-sm-10">
                    <label id="label">Fecha de Ingreso:</label><input type="text" name="fechaIng" id="fechaIng" placeholder="AAAA-MM-DD">
                    <label id="label">Salario:</label><input type="text" name="salario" id="salario" placeholder="Salario Propuesto">
                    <label id="label">Bonificaciones:</label><input type="text" name="bonificacion" id="bonificacion" placeholder="No son salario"></br>
                    <label id="label">Tipo Jornada Laboral:</label>
                        <select type="text" name="tjornada" id="tjornada">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * FROM tblTipoJornada";
                                $result = sqlsrv_query($db,$sql);
                                             
                                if ($result > 0)
                                {
                                    $comboJornada="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboJornada .=" <option value='".$row['idTipoJornada']."'>".$row['strTipoJornada']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboJornada;
                            ?>
                        </select>
                    <label id="label">Jornada Laboral:</label>
                        <select type="text" name="jornada" id="jornada">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * FROM tblJornada";
                                $result = sqlsrv_query($db,$sql);
                                             
                                if ($result > 0)
                                {
                                    $comboJornada="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboJornada .=" <option value='".$row['idJornada']."'>".$row['strJornada']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboJornada;
                            ?>
                        </select>
                    </div>
                </div></br>
            <button type="submit" value="Guardar" class="btn btn-primary">Guardar</button>
        </form>
        <a href="principal.php"><h4 align="center">Atrás</h4></a>
    </body>
    </html>