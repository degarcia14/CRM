<html>
<head>
	<title>Contratos</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>

<body>
	<h1>CONTRATO DE SERVICIO EXISTENTE</h1>
	<div id="topnav">
            <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 -->
    </div><hr>
        <form method="POST" id="empresa" action="ContratoBuscar.php" name="empresa">
            <label id="label">Cliente Potencial:</label>
            <select id="emp" name="emp">
                <option value="0">Empresa</option>
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
            </select><br><br>
            <label id="label">Fecha de Contrato: </label>
            <select name="Mes" id="Mes" class="texto1">
                <option value="0">Mes</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Octubre</option>
                <option value="10">Septiembre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <select name="Anio" id="Anio" class="texto1">
                <option value="0">Año</option>
                <?php for ($i=2014;$i<=2100;$i++){
                echo "<option value=$i>$i</option>";
                } ?>
            </select><br><br>
            <button type="submit" value="Siguiente" class="btn btn-primary">Siguiente</button>
            <a href="ContratoBuscarTodos.php"><h4>Ver todos los contratos</h4></a>  
        </form>     
</body>
</html>