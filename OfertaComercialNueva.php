<html>
<head>
	<title>Oferta Comercial</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>NUEVA OFERTA COMERCIAL</h1>
<h4>Debe existir el cliente potencial y los datos del representante legal</h4>
	<div id="topnav">
           <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 -->        <a href="login.php"><?php //session_destroy() ?>Salir</a>
    </div><hr>
                <form id="calcularOferta" action="ofertaComercialCalcularPdf.php" method="POST">
                    <div class="form-group">
                        <label for="inputDestinatario" class="col-sm-2 control-label" id="label"><h3>Datos Empresa Destinataria</h3></label>
                            <div class="col-sm-10">
                                <label id="label">Empresa: </label>
                                <select name="cliente" id="cliente">
                                    <?php 
                                        include("conexionSqlsrv.php");
                                        include("validar.php");

                                        $sqlPotencial="SELECT TOP 1000 [idPotencial]
                                                    ,[strNombre]
                                                FROM [tblClientePotencial]";

                                        $resultPotencial = sqlsrv_query($db,$sqlPotencial);
                 
                                        if ($resultPotencial > 0)
                                        {
                                            $comboPotencial="";
                                            while ($row = sqlsrv_fetch_array($resultPotencial,SQLSRV_FETCH_BOTH)) 
                                            {
                                                $comboPotencial .=" <option value='".$row['idPotencial']."'>".$row['strNombre']."</option>"; 
                                            }           
                                        }
                                        else
                                        {
                                            echo "No hubo resultados";
                                        }
                                        sqlsrv_close($db); //cerramos la conexión
                                        echo $comboPotencial;
                                    ?>
                                </select>
                                <label id="label">Representante: </label>
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
                                <label id="label">Contacto: </label>
                                <select name="contacto" id="contacto">
                                    <?php 
                                        include("conexionSqlsrv.php");

                                        $sqlContacto="SELECT TOP 1000 [idContacto]
                                                            ,[strNombre]+' '+[strApellido] as 'Contacto'
                                                        FROM [dbConsola].[dbo].[tblContacto]";

                                        $resultContacto = sqlsrv_query($db,$sqlContacto);
                 
                                        if ($resultContacto > 0)
                                        {
                                            $comboContacto="";
                                            while ($row = sqlsrv_fetch_array($resultContacto,SQLSRV_FETCH_BOTH)) 
                                            {
                                                $comboContacto .=" <option value='".$row['idContacto']."'>".$row['Contacto']."</option>"; 
                                            }           
                                        }
                                        else
                                        {
                                            echo "No hubo resultados";
                                        }
                                        sqlsrv_close($db); //cerramos la conexión
                                        echo $comboContacto;
                                    ?>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="fechaEnvio" class="col-sm-2 control-label" id="label">Fecha Envío de Oferta:</label>
                            <div class="col-sm-10">
                                <input type="text"  name="fecha" id="fecha" placeholder="AAAA-MM-DD">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="Descripcion" class="col-sm-2 control-label" id="label"><h3>Descripción de la oferta</h3></label>
                            <div class="col-sm-10">
                            	<!-- <label for="Informacion" class="col-sm-2 control-label" id="label"><h5>Trabajador en misión</h5></label> -->
                            </div>
                            	<label id="label">Salario base: </label><input type="text"  name="salario" id="salario" placeholder="Salario propuesto">
                            	<label id="label">Número de trabajadores: </label><input type="text" name="trabajadores" id="trabajadores" placeholder="Solicitados">
                                <label id="label">Porcentaje de Riesgo: </label><!-- <input type="text" name="pctRiesgo" id="pctRiesgo" placeholder="Riesgo"> -->
                                    <select type="text" name="pctRiesgo" id="pctRiesgo">
                                        <?php 
                                            include("conexionSqlsrv.php");
                                            
                                            $sql="SELECT * from tblPctRiesgo";
                                            $result = sqlsrv_query($db,$sql);
                                             
                                            if ($result > 0)
                                            {
                                                $combobit="";
                                                while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_BOTH)) 
                                                {
                                                    $combobit .=" <option value='".$row['strValorPctRiesgo']."'>".$row['strValorPctRiesgo']."</option>"; 
                                                }
                                            }
                                            else
                                            {
                                                echo "No hubo resultados";
                                            }
                                            sqlsrv_close($db); //cerramos la conexión
                                            echo $combobit;
                                        ?>
                                    </select><br/>
                                <label id="label">Objeto de la oferta: </label><br/><textarea id="objeto" name="objeto" placeholder="Descripción"></textarea>
                    </div>

                    <br/>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" value="calc" class="btn btn-primary" id="calcular">Calcular y Guardar</button>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                <script type="text/javascript" src="jquerymobile/jquery.mobile-1.0a1.min.js">
                                        $("#calcular").click(function(){
                                            $("#content").load('ofertaComercialCalcularPdf.php');
                                                return true;//false;
                                        });
                            </script>
                            
                        </div>
                    </div>
                </form>     
</body>
</html>