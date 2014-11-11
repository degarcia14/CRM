<!DOCTYPE html>
<html>
<head>
	<title>Oferta Comercial Nueva Calculada</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>VALORES NUEVA OFERTA COMERCIAL</h1><br/>
	<div id="topnav">
           <!--             <?php //echo $_SESSION['usuario'] ?>|<a href="login.php"><?php //session_destroy() ?>Salir</a>
 -->
 		<a href="login.php"><?php //session_destroy() ?>Salir</a>
    </div><hr>

<?php 
    
	include("conexionSqlsrv.php");
    include("validar.php"); 
	include("parametros.php");

	$parametros = new parametros;
    $validar = new validar;

    //empresa destinataria
    $empresa = $_POST['cliente'];
    $nit = $_POST['nit'];
    $contacto = $_POST['contacto'];
    $repLegal = $_POST['repLegal'];
    $fecha = $_POST['fecha'];
    $objeto = $_POST['objeto'];
    //por formulario
    $salario = $_POST['salario'];
    $trabajadores = $_POST['trabajadores'];
    $pctRiesgo = $_POST['pctRiesgo'];
    //seguridad social
    $auxTransporte = $parametros->auxTransporte;    
    $pctPension = $parametros->pctPension;
    $pctCaja = $parametros->pctCaja;
    //prestaciones sociales
    $pctCesantias = $parametros->pctCesantias;
    $pctIntCesantias = $parametros->pctIntCesantias;
    $pctPrima = $parametros->pctPrima;
    $pctVacaciones = $parametros->pctVacaciones;
    //seguro de vida
    $pctSeguroVida = $parametros->pctSeguroVida;
    //totales
    $pctAdministracion = $parametros->pctAdministracion;
    $pctImprevistos = $parametros->pctImprevistos;
    $pctIva = $parametros->iva;

    //calculos SS
    $aportePension = ceil($salario*$pctPension);
    $aporteRiesgos = ceil($salario*$pctRiesgo);
    $aporteCaja = ceil($salario*$pctCaja);
    $totalSs = ceil($aporteCaja + $aporteRiesgos + $aportePension);
    //calculo PS
    $cesantias = ceil(($salario+$auxTransporte)*$pctCesantias);
    $intCesantias = ceil(($salario+$auxTransporte)*$pctIntCesantias);
    $primaServicios = ceil(($salario+$auxTransporte)*$pctPrima);
    $vacaciones = ceil($salario*$pctVacaciones);
    $totalPs = ceil($cesantias + $intCesantias + $primaServicios + $vacaciones);
    //calculos de valores
    $salarioPsSs = ceil((($salario*($parametros->pctSsTotal+$parametros->pctPsTotal+$pctRiesgo))+$salario)*$trabajadores);
    $auxTransportePsSs = ceil((($auxTransporte*$parametros->pctPsTotal)+$auxTransporte)*$trabajadores);
    $totalSalarioPsSs = ceil($salarioPsSs + $auxTransportePsSs);
    //seguro vida
    $segVida = ceil($salario*$pctSeguroVida);
    //totales valores
    $valorMes = ceil($totalSalarioPsSs + $segVida);
    $valorAdmon = ceil($valorMes * $pctAdministracion);
    $valorImprevistos = ceil($valorMes * $pctImprevistos);
    $valorIva = ceil(($valorImprevistos + $valorMes + $valorAdmon)*$pctIva);
    $valorServicio = ($valorMes + $valorAdmon + $valorImprevistos + $valorIva);


    $response = $validar->validarData($_POST); 

    if($response){
        echo $validar->showErrors();
    }
    else{
        $sql="EXEC dbo.SPCagregaOfertaComercial '".$repLegal."','".$contacto."','".$nit."','".$fecha."','".$trabajadores."','".$salario."','".$objeto."','".
            $pctRiesgo."'";
   
            $stmt =  sqlsrv_query($db, $sql);
    
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        while($row = sqlsrv_fetch_array($stmt)) {
            die(print_r(sqlsrv_errors(), true));
            echo "OK";
        }
        sqlsrv_free_stmt($stmt);

        sqlsrv_close($db);
?>
    <form id="ofertaCalculada" action="ofertaComercialGuardar.php" method="POST">
    	<div class="form-group">
            <label for="Descripcion" class="col-sm-2 control-label" id="label"><h3>Descripcion de la oferta</h3></label>
            	<label id="label">Nombre Empresa: <?php echo $empresa; ?></label>
    	        <label id="label">Identificación: <?php echo $nit; ?></label><br/>
    	        <label id="label">Empleado de Contacto: <?php echo $contacto; ?></label>
                <label id="label">Representante Legal: <?php echo $repLegal; ?></label><br/>
                <label id="label">Objeto Oferta: <?php echo $objeto; ?></label>
            <hr>
            <div class="col-sm-10">
    	 	  	<label for="destino" class="col-sm-2 control-label" id="label"><h5>Trabajador en misión</h5></label>
            </div>
            <div class="col-sm-10">
            	<label id="label">Trabajador(es): <?php echo $trabajadores; ?></label><br/><br/>
    			<label id="label">Salario Base: <?php echo $salario." Pesos"; ?></label>
    	    	<label id="label">Salario+P.S.+S.S.: <?php echo $salarioPsSs." Pesos";?></label><br/><br/>
    	    	<label id="label">Auxilio de Transporte: <?php echo ceil($auxTransporte)." Pesos"; ?></label>
    	    	<label id="label">Auxilio+P.S.+S.S.: <?php echo $auxTransportePsSs." Pesos";?></label>
    	    </div><hr>

    	    <div class="col-sm-10">
    	 	  	<label for="destino" class="col-sm-2 control-label" id="label"><h5>Seguridad Social (S.S.)</h5></label>
            </div>
            <div class="col-sm-10">
    			<label id="label" >Aportes Pensión: <?php echo $aportePension." Pesos"; ?></label>
    	    	<label id="label">Aporte a Riesgos Profesionales: <?php echo $aporteRiesgos." Pesos";?></label>
    	    	<label id="label">Caja de Compensación: <?php echo $aporteCaja." Pesos"; ?></label><br/><br/>
    	    	<label id="label">Total Aportes S.S.: <?php echo $totalSs." Pesos";?></label>
    	    </div><hr>

    	    <div class="col-sm-10">
    	 	  	<label for="destino" class="col-sm-2 control-label" id="label"><h5>Prestaciones Sociales (P.S.)</h5></label>
            </div>
            <div class="col-sm-10">
    			<label id="label" >Cesantias: <?php echo $cesantias." Pesos"; ?></label>
    	    	<label id="label">Intereses a las Cesantias: <?php echo $intCesantias." Pesos";?></label><br/><br/>
    	    	<label id="label">Prima de Servicios: <?php echo $primaServicios." Pesos"; ?></label>
    	    	<label id="label">Vacaciones: <?php echo $vacaciones." Pesos"; ?></label><br/><br/>
    	    	<label id="label">Total Aportes P.S.: <?php echo $totalPs." Pesos";?></label>
    	    </div><hr>

    	    <div class="col-sm-10">
    	 	  	<label for="destino" class="col-sm-2 control-label" id="label"><h5>Seguro de Vida</h5></label>
            </div>
            <div class="col-sm-10">
    			<label id="label" >Seguro de Vida: <?php echo $segVida." Pesos"; ?></label>
    	    </div><hr>

    	    <div class="col-sm-10">
    	 	  	<label for="destino" class="col-sm-2 control-label" id="label"><h5>Totales</h5></label>
            </div>
            <div class="col-sm-10">
    			<label id="label" >Costo Mensual: <?php echo $valorMes." Pesos"; ?></label>
    	    	<label id="label">Administracion: <?php echo $valorAdmon." Pesos";?></label><br/><br/>
    	    	<label id="label">Imprevistos: <?php echo $valorImprevistos." Pesos"; ?></label>
    	    	<label id="label">IVA: <?php echo $valorIva." Pesos"; ?></label><br/><br/>
    	    	<label id="label">Total Servicio: <?php echo $valorServicio." Pesos";?></label>
    	    </div><hr>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="Principal.php"><h6 align="center">Atras</h6></a>           
                </div>
            </div>
        </div>
    </form>
<?php
    }
?>


</body>
</html>