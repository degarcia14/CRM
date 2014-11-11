
<!DOCTYPE html>
<html>
<head>
	<title>Perfil del Trabajador</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1>PERFIL NUEVO</h1>
    	<div id="topnav">
        <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
        --></div><hr>
    <form class="form-horizontal" role="form" method="POST" action="PerfilTMGuardar.php">
        <label id="label"><h4>Informacion Basica:</h4></label>
        <label id="label">Empresa:</label>
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
                        $comboEmp ="";
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
            <label id="label">Cargo:</label><input type="text" id="cargo" name="cargo" placeholder="Cargo solicitado"></input></br>
            <label id="label">Género:</label>   
            <select id="genero" name="genero">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlGenero="SELECT TOP 1000 [idGenero]
                          ,[strGenero]
                            FROM [tblGenero]";
                    $resultGenero = sqlsrv_query($db,$sqlGenero);
                 
                    if ($resultGenero > 0)
                    {
                        $comboGen="";
                        while ($row = sqlsrv_fetch_array($resultGenero,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboGen .=" <option value='".$row['idGenero']."'>".$row['strGenero']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboGen  ;
                ?>
            </select>
            <label id="label">Edad:</label>
            <select id="edad" name="edad">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlEdad="SELECT TOP 1000 [idEdad]
                          ,[strEdad]
                            FROM [tblEdad]";
                    $resultEdad = sqlsrv_query($db,$sqlEdad);
                 
                    if ($resultEdad > 0)
                    {
                        $comboEdad="";
                        while ($row = sqlsrv_fetch_array($resultEdad,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEdad .=" <option value='".$row['idEdad']."'>".$row['strEdad']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEdad  ;
                ?>
            </select>
            <label id="label">Estado Civil:</label>
            <select id="estadoCivil" name="estadoCivil">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlEstCivi="SELECT TOP 1000 [idEstadoCivil]
                          ,[strEstadoCivil]
                            FROM [tblEstadoCivil]";
                    $resultEstCivi = sqlsrv_query($db,$sqlEstCivi);
                 
                    if ($resultEstCivi > 0)
                    {
                        $comboEstCivi="";
                        while ($row = sqlsrv_fetch_array($resultEstCivi,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEstCivi .=" <option value='".$row['idEstadoCivil']."'>".$row['strEstadoCivil']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEstCivi  ;
                ?>
            </select>
            <label id="label">Estatura:</label><input type="text" id="estatura" name="estatura" placeholder="En Centiemtros"></input><br>
            <label id="label">Estudios:</label>
            <select id="estudio" name="estudio">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlEstudio="SELECT TOP 1000 [idEstudio]
                          ,[strEstudio]
                            FROM [tblEstudio]";
                    $resultEstudio = sqlsrv_query($db,$sqlEstudio);
                 
                    if ($resultEstudio > 0)
                    {
                        $comboEstudio="";
                        while ($row = sqlsrv_fetch_array($resultEstudio,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboEstudio .=" <option value='".$row['idEstudio']."'>".$row['strEstudio']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboEstudio;
                ?>
            </select></br>
            
            <table border="0px" align="center" style="width:800px;">
                <tr>
                    <td>
                        <label id="label">Conociemintos:</label></br>
                        <textarea type="text" name="conocimiento" id="conocimiento" placeholder="Adicionales a los estudios"></textarea>
                    </td>
                    <td> 
                        <label id="label">Funciones:</label></br>
                        <textarea type="text" name="funcion" id="funcion" placeholder="Labores del cargo"></textarea></br>
                    </td>
                </tr>
            </table>
            <!-- <label id="label">Conociemintos:</label></br>
                <textarea type="text" name="conocimiento" id="conocimiento" placeholder="Adicionales a los estudios"></textarea>
            <label id="label">Funciones:</label>
                <textarea type="text" name="funcion" id="funcion" placeholder="Labores del cargo"></textarea></br> -->

            <label id="label">Experiencia:</label>
            <select id="experiencia" name="experiencia">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlExperiencia="SELECT TOP 1000 [idExperiencia]
                          ,[strValorExp]
                            FROM [tblExperiencia]";
                    $resultExp = sqlsrv_query($db,$sqlExperiencia);
                 
                    if ($resultExp > 0)
                    {
                        $comboExp="";
                        while ($row = sqlsrv_fetch_array($resultExp,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboExp .=" <option value='".$row['idExperiencia']."'>".$row['strValorExp']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboExp;
                ?>
            </select>
            <label id="label">Ubicación:</label><input type="text" id="ciudad" name="ciudad" placeholder="Ciudad"></input>
            <label id="label">Exigencia:</label>
                <select name="exigencia" id="exigencia">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                </select>
            <label id="label">Dotación:</label>
                <select id="dotacion" name="dotacion">
                    <?php 
                        include("conexionSqlsrv.php");
                        $sqlDotacion="SELECT TOP 1000 [idDotacion]
                              ,[strDotacion]
                                FROM [tblDotacion]";
                        $dotacion = sqlsrv_query($db,$sqlDotacion);
                     
                        if ($dotacion > 0)
                        {
                            $comboDotacion="";
                            while ($row = sqlsrv_fetch_array($dotacion,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboDotacion .=" <option value='".$row['idDotacion']."'>".$row['strDotacion']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboDotacion;
                    ?>
                </select><br>
            <label id="label"><h4>Riesgos:</h4></label><br>
                <label id="label">Factor 1:</label>
                <select id="factor1" name="factor1">
                    <?php 
                        include("conexionSqlsrv.php");  

                        $sqlFactRiesgo="SELECT TOP 1000 [idFactor]
                              ,[strRiesgo]
                                FROM [tblFactRiesgo]";
                        $FactRiesgo = sqlsrv_query($db,$sqlFactRiesgo);
                     
                        if ($FactRiesgo > 0)
                        {
                            $comboFactRiesgo="";
                            while ($row = sqlsrv_fetch_array($FactRiesgo,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboFactRiesgo .=" <option value='".$row['idFactor']."'>".$row['strRiesgo']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboFactRiesgo;
                    ?>
                </select>
                <label id="label">Factor 2:</label>
                <select id="factor2" name="factor2">
                    <?php 
                        include("conexionSqlsrv.php");  

                        $sqlFactRiesgo="SELECT TOP 1000 [idFactor]
                              ,[strRiesgo]
                                FROM [tblFactRiesgo]";
                        $FactRiesgo = sqlsrv_query($db,$sqlFactRiesgo);
                     
                        if ($FactRiesgo > 0)
                        {
                            $comboFactRiesgo="";
                            while ($row = sqlsrv_fetch_array($FactRiesgo,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboFactRiesgo .=" <option value='".$row['idFactor']."'>".$row['strRiesgo']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboFactRiesgo;
                    ?>
                </select>
                <label id="label">Factor 3:</label>
                <select id="factor3" name="factor3">
                    <?php 
                        include("conexionSqlsrv.php");  

                        $sqlFactRiesgo="SELECT TOP 1000 [idFactor]
                              ,[strRiesgo]
                                FROM [tblFactRiesgo]";
                        $FactRiesgo = sqlsrv_query($db,$sqlFactRiesgo);
                     
                        if ($FactRiesgo > 0)
                        {
                            $comboFactRiesgo="";
                            while ($row = sqlsrv_fetch_array($FactRiesgo,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboFactRiesgo .=" <option value='".$row['idFactor']."'>".$row['strRiesgo']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboFactRiesgo;
                    ?>
                </select><br>
                <label id="label">Factor 4:</label>
                <select id="factor4" name="factor4">
                    <?php 
                        include("conexionSqlsrv.php");  

                        $sqlFactRiesgo="SELECT TOP 1000 [idFactor]
                              ,[strRiesgo]
                                FROM [tblFactRiesgo]";
                        $FactRiesgo = sqlsrv_query($db,$sqlFactRiesgo);
                     
                        if ($FactRiesgo > 0)
                        {
                            $comboFactRiesgo="";
                            while ($row = sqlsrv_fetch_array($FactRiesgo,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboFactRiesgo .=" <option value='".$row['idFactor']."'>".$row['strRiesgo']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboFactRiesgo;
                    ?>
                </select>
                <label id="label">Factor 5:</label>
                <select id="factor5" name="factor5">
                    <?php 
                        include("conexionSqlsrv.php");  

                        $sqlFactRiesgo="SELECT TOP 1000 [idFactor]
                              ,[strRiesgo]
                                FROM [tblFactRiesgo]";
                        $FactRiesgo = sqlsrv_query($db,$sqlFactRiesgo);
                     
                        if ($FactRiesgo > 0)
                        {
                            $comboFactRiesgo="";
                            while ($row = sqlsrv_fetch_array($FactRiesgo,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboFactRiesgo .=" <option value='".$row['idFactor']."'>".$row['strRiesgo']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboFactRiesgo;
                    ?>
                </select><br>
                <label id="label">Porcentaje de Riesgo:</label>
                <select id="pctRiesgo" name="pctRiesgo">
                    <?php 
                        include("conexionSqlsrv.php");  

                        $sqlPctRiesgo="SELECT TOP 1000 [idPctRiesgo]
                              ,[strValorPctRiesgo]
                                FROM [tblPctRiesgo]";
                        $pctRiesgo = sqlsrv_query($db,$sqlPctRiesgo);
                     
                        if ($pctRiesgo > 0)
                        {
                            $comboPctRiesgo="";
                            while ($row = sqlsrv_fetch_array($pctRiesgo,SQLSRV_FETCH_BOTH)) 
                            {
                                $comboPctRiesgo .=" <option value='".$row['idPctRiesgo']."'>".$row['strValorPctRiesgo']."</option>"; 
                            }           
                        }
                        else
                        {
                            echo "No hubo resultados";
                        }
                        sqlsrv_close($db); //cerramos la conexión
                        echo $comboPctRiesgo;
                    ?>
                </select><br>
                <label id="label"><h4>Exámenes Médicos:</h4></label><br>
                    <label id="label">Examen 1:</label>
                    <select id="medico1" name="medico1">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlMedico="SELECT TOP 1000 [idExamMedico]
                                  ,[strExamen]
                                    FROM [tblExamMedico]";
                            $medico = sqlsrv_query($db,$sqlMedico);
                         
                            if ($medico > 0)
                            {
                                $comboMedico="";
                                while ($row = sqlsrv_fetch_array($medico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboMedico .=" <option value='".$row['idExamMedico']."'>".$row['strExamen']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboMedico;
                        ?>
                    </select>
                    <label id="label">Examen 2:</label>
                    <select id="medico2" name="medico2">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlMedico="SELECT TOP 1000 [idExamMedico]
                                  ,[strExamen]
                                    FROM [tblExamMedico]
                                    ORDER BY [idExamMedico]
                                    DESC";
                            $medico = sqlsrv_query($db,$sqlMedico);
                         
                            if ($medico > 0)
                            {
                                $comboMedico="";
                                while ($row = sqlsrv_fetch_array($medico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboMedico .=" <option value='".$row['idExamMedico']."'>".$row['strExamen']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboMedico;
                        ?>
                    </select><br>
                    <label id="label">Examen 3:</label>
                    <select id="medico3" name="medico3">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlMedico="SELECT TOP 1000 [idExamMedico]
                                  ,[strExamen]
                                    FROM [tblExamMedico]
                                    ORDER BY [idExamMedico]
                                    DESC";
                            $medico = sqlsrv_query($db,$sqlMedico);
                         
                            if ($medico > 0)
                            {
                                $comboMedico="";
                                while ($row = sqlsrv_fetch_array($medico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboMedico .=" <option value='".$row['idExamMedico']."'>".$row['strExamen']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboMedico;
                        ?>
                    </select>
                    <label id="label">Examen 4:</label>
                    <select id="medico4" name="medico4">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlMedico="SELECT TOP 1000 [idExamMedico]
                                  ,[strExamen]
                                    FROM [tblExamMedico]
                                    ORDER BY [idExamMedico]
                                    DESC";
                            $medico = sqlsrv_query($db,$sqlMedico);
                         
                            if ($medico > 0)
                            {
                                $comboMedico="";
                                while ($row = sqlsrv_fetch_array($medico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboMedico .=" <option value='".$row['idExamMedico']."'>".$row['strExamen']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboMedico;
                        ?>
                    </select>
                 <label id="label"><h4>Pruebas Psicologicas:</h4></label><br>
                    <label id="label">Prueba 1:</label>
                    <select id="psico1" name="psico1">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlPsico="SELECT TOP 1000 [idPruebaPsico]
                                  ,[strPruebaP]
                                    FROM [tblPruebasPsico]";
                            $psico = sqlsrv_query($db,$sqlPsico);
                         
                            if ($psico > 0)
                            {
                                $comboPsico="";
                                while ($row = sqlsrv_fetch_array($psico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboPsico .=" <option value='".$row['idPruebaPsico']."'>".$row['strPruebaP']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboPsico;
                        ?>
                    </select>
                    <label id="label">Prueba 2:</label>
                    <select id="psico2" name="psico2">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlPsico="SELECT TOP 1000 [idPruebaPsico]
                                  ,[strPruebaP]
                                    FROM [tblPruebasPsico]
                                    ORDER BY idPruebaPsico
                                    DESC";
                            $psico = sqlsrv_query($db,$sqlPsico);
                         
                            if ($psico > 0)
                            {
                                $comboPsico="";
                                while ($row = sqlsrv_fetch_array($psico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboPsico .=" <option value='".$row['idPruebaPsico']."'>".$row['strPruebaP']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboPsico;
                        ?>
                    </select>
                    <label id="label">Prueba 3:</label>
                    <select id="psico3" name="psico3">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlPsico="SELECT TOP 1000 [idPruebaPsico]
                                  ,[strPruebaP]
                                    FROM [tblPruebasPsico]
                                    ORDER BY idPruebaPsico
                                    DESC";
                            $psico = sqlsrv_query($db,$sqlPsico);
                         
                            if ($psico > 0)
                            {
                                $comboPsico="";
                                while ($row = sqlsrv_fetch_array($psico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboPsico .=" <option value='".$row['idPruebaPsico']."'>".$row['strPruebaP']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboPsico;
                        ?>
                    </select>

                <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>4. Habilidades del trabajador</h3></label>
                <div class="col-sm-10">
                    <label id="label">Extraversión:</label>
                        <select type="text" name="extroversion" id="extroversion">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * from tblHabExtraversion";
                                $result = sqlsrv_query($db,$sql);
                                 
                                if ($result > 0)
                                {
                                    $comboExtroversion="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboExtroversion .=" <option value='".$row['idExtraversion']."'>".$row['strExtraversion']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboExtroversion;
                            ?>
                        </select>
                    <label id="label">Receptividad:</label>
                        <select type="text" name="receptividad" id="receptividad">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * from tblHabReceptividad";
                                $result = sqlsrv_query($db,$sql);
                                 
                                if ($result > 0)
                                {
                                    $comboReceptividad="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboReceptividad .=" <option value='".$row['idReceptividad']."'>".$row['strReceptividad']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboReceptividad;
                            ?>
                        </select>
                    <label id="label">Autocontrol:</label>
                        <select type="text" name="autocontrol" id="autocontrol">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * from tblHabAutocontrol";
                                $result = sqlsrv_query($db,$sql);
                                 
                                if ($result > 0)
                                {
                                    $comboAutocontrol="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboAutocontrol.=" <option value='".$row['idAutocontrol']."'>".$row['strAutocontrol']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboAutocontrol;
                            ?>
                        </select></br>
                    <label id="label">Ansiedad:</label>
                        <select type="text" name="ansiedad" id="ansiedad">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * from tblHabAnsiedad";
                                $result = sqlsrv_query($db,$sql);
                                 
                                if ($result > 0)
                                {
                                    $comboAnsiedad="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboAnsiedad.=" <option value='".$row['idAnsiedad']."'>".$row['strAnsiedad']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboAnsiedad;
                            ?> 
                        </select>
                    <label id="label">Independencia:</label>
                        <select type="text" name="independencia" id="independencia">
                            <?php 
                                include("conexionSqlsrv.php");
                                $sql="SELECT * from tblHabIndependencia";
                                $result = sqlsrv_query($db,$sql);
                                 
                                if ($result > 0)
                                {
                                    $comboIndependencia="";
                                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                    {
                                        $comboIndependencia.=" <option value='".$row['idIndependencia']."'>".$row['strIndependencia']."</option>"; 
                                    }
                                }
                                else
                                {
                                    echo "No hubo resultados";
                                }
                                sqlsrv_close($db); //cerramos la conexión
                                echo $comboIndependencia;
                            ?>                                    
                        </select>
                </div>
                
                <label id="label"><h4>Pruebas Técnicas:</h4></label><br>
                    <label id="label">Prueba 1:</label>
                    <select id="Técnico1" name="Técnico1">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlTécnico="SELECT TOP 1000 [idPruebaTéc]
                                  ,[strPruebaT]
                                    FROM [tblPruebasTéc]";
                            $Técnico = sqlsrv_query($db,$sqlTécnico);
                         
                            if ($Técnico > 0)
                            {
                                $comboTécnico="";
                                while ($row = sqlsrv_fetch_array($Técnico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboTécnico .=" <option value='".$row['idPruebaTéc']."'>".$row['strPruebaT']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboTécnico;
                        ?>
                    </select>
                    <label id="label">Prueba 2:</label>
                    <select id="Técnico2" name="Técnico2">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlTécnico="SELECT TOP 1000 [idPruebaTéc]
                                  ,[strPruebaT]
                                    FROM [tblPruebasTéc]";
                            $Técnico = sqlsrv_query($db,$sqlTécnico);
                         
                            if ($Técnico > 0)
                            {
                                $comboTécnico="";
                                while ($row = sqlsrv_fetch_array($Técnico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboTécnico .=" <option value='".$row['idPruebaTéc']."'>".$row['strPruebaT']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboTécnico;
                        ?>
                    </select>
                    <label id="label">Prueba 3:</label>
                    <select id="Técnico3" name="Técnico3">
                        <?php 
                            include("conexionSqlsrv.php");

                            $sqlTécnico="SELECT TOP 1000 [idPruebaTéc]
                                  ,[strPruebaT]
                                    FROM [tblPruebasTéc]";
                            $Técnico = sqlsrv_query($db,$sqlTécnico);
                         
                            if ($Técnico > 0)
                            {
                                $comboTécnico="";
                                while ($row = sqlsrv_fetch_array($Técnico,SQLSRV_FETCH_BOTH)) 
                                {
                                    $comboTécnico .=" <option value='".$row['idPruebaTéc']."'>".$row['strPruebaT']."</option>"; 
                                }           
                            }
                            else
                            {
                                echo "No hubo resultados";
                            }
                            sqlsrv_close($db); //cerramos la conexión
                            echo $comboTécnico;
                        ?>
                    </select><br>
        <label id="label"><h4>Capacidades:</h4></label>
        <label id="label">Capacidad 1:</label>
            <select id="capacidad1" name="capacidad1">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlCap="SELECT TOP 1000 [idCapacidad]
                                ,[strCapacidad]
                            FROM [tblCapacidades]
                            ORDER BY [idCapacidad]
                            DESC";

                    $resultCap = sqlsrv_query($db,$sqlCap);
                 
                    if ($resultCap > 0)
                    {
                        $comboCap="";
                        while ($row = sqlsrv_fetch_array($resultCap,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboCap .=" <option value='".$row['idCapacidad']."'>".$row['strCapacidad']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboCap;
                ?>
            </select>
            <label id="label">Capacidad 2:</label>
            <select id="capacidad2" name="capacidad2">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlCap="SELECT TOP 1000 [idCapacidad]
                                ,[strCapacidad]
                            FROM [tblCapacidades]
                            ORDER BY [idCapacidad]
                            DESC";

                    $resultCap = sqlsrv_query($db,$sqlCap);
                 
                    if ($resultCap > 0)
                    {
                        $comboCap="";
                        while ($row = sqlsrv_fetch_array($resultCap,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboCap .=" <option value='".$row['idCapacidad']."'>".$row['strCapacidad']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboCap;
                ?>
            </select>
            <label id="label">Capacidad 3:</label>
            <select id="capacidad3" name="capacidad3">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlCap="SELECT TOP 1000 [idCapacidad]
                                ,[strCapacidad]
                            FROM [tblCapacidades]
                            ORDER BY [idCapacidad]
                            DESC";

                    $resultCap = sqlsrv_query($db,$sqlCap);
                 
                    if ($resultCap > 0)
                    {
                        $comboCap="";
                        while ($row = sqlsrv_fetch_array($resultCap,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboCap .=" <option value='".$row['idCapacidad']."'>".$row['strCapacidad']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboCap;
                ?>
            </select><br>
            <label id="label">Capacidad 4:</label>
            <select id="capacidad4" name="capacidad4">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlCap="SELECT TOP 1000 [idCapacidad]
                                ,[strCapacidad]
                            FROM [tblCapacidades]
                            ORDER BY [idCapacidad]
                            DESC";

                    $resultCap = sqlsrv_query($db,$sqlCap);
                 
                    if ($resultCap > 0)
                    {
                        $comboCap="";
                        while ($row = sqlsrv_fetch_array($resultCap,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboCap .=" <option value='".$row['idCapacidad']."'>".$row['strCapacidad']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboCap;
                ?>
            </select>
            <label id="label">Capacidad 5:</label>
            <select id="capacidad5" name="capacidad5">
                <?php 
                    include("conexionSqlsrv.php");

                    $sqlCap="SELECT TOP 1000 [idCapacidad]
                                ,[strCapacidad]
                            FROM [tblCapacidades]
                            ORDER BY [idCapacidad]
                            DESC";

                    $resultCap = sqlsrv_query($db,$sqlCap);
                 
                    if ($resultCap > 0)
                    {
                        $comboCap="";
                        while ($row = sqlsrv_fetch_array($resultCap,SQLSRV_FETCH_BOTH)) 
                        {
                            $comboCap .=" <option value='".$row['idCapacidad']."'>".$row['strCapacidad']."</option>"; 
                        }           
                    }
                    else
                    {
                        echo "No hubo resultados";
                    }
                    sqlsrv_close($db); //cerramos la conexión
                    echo $comboCap;
                ?>
            </select><br><br>
            <label id="label">Observaciones:</label><br>
                    <textarea type="text" id="observacion" name="observacion" placeholder="Observaciones o información adicional"></textarea><br><br> 
        <!-- <div class="col-offsert-sm-2 col-sm-10"> -->
            <button type="submit" class="btn btn-primary" value="guardar">Guardar</button>                         
        <!-- </div>  -->  
    </form>
</body>
</html>