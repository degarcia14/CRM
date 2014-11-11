<?php 
    
	include("conexionSqlsrv.php");
    include("validar.php"); 
	include("parametros.php");
    include("pdf.php");
    //require_once("../class.PHPMailer.php");//incluir libreria correo

	$parametros = new parametros;
    $validar = new validar;

    // obtener datos empresa destinataria
    $empresa = $_POST['cliente'];
    $sqlEmpresa = "SELECT * FROM dbo.tblClientePotencial WHERE idPotencial =".$empresa;
    $rstEmpresa = sqlsrv_query($db,$sqlEmpresa);
    $rowEmpresa = sqlsrv_fetch_array($rstEmpresa,SQLSRV_FETCH_BOTH);
    //nombre empresa
    $strEmpresa = $rowEmpresa['strNombre'];
    //numero NIT
    $strNit = $rowEmpresa['strNit'];
    //Direccion Cliente Potencial
    $strDireccion = $rowEmpresa['strDireccion'];
    //Telefono Cliente Potencial
    $strTelefono = $rowEmpresa['strTelefono'];
    //Email Empresa
    $strMailContacto = $rowEmpresa['strMailContacto'];
    //obtener nombre contacto
    $contacto = $_POST['contacto'];
    $sqlContacto = "SELECT [idContacto],[strNombre]+' '+[strApellido] as 'Contacto' FROM dbo.tblContacto WHERE idContacto =".$contacto;
    $rstContacto = sqlsrv_query($db,$sqlContacto);
    $rowContacto = sqlsrv_fetch_array($rstContacto,SQLSRV_FETCH_BOTH);
    $strContacto = $rowContacto['Contacto'];
    //obtener nombre rep Legal
    ($repLegal = $_POST['repLegal']);
    $sqlRepLegal = "SELECT [idContacto],[strNombre]+' '+[strApellido] as 'RepLegal' FROM dbo.tblContacto WHERE idContacto =".$repLegal;
    $rstRepLegal = sqlsrv_query($db,$sqlRepLegal);
    $rowRepLegal = sqlsrv_fetch_array($rstRepLegal,SQLSRV_FETCH_BOTH);
    $strRepLegal = $rowRepLegal['RepLegal'];
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
    $segVida = ceil($salario*$pctSeguroVida*$trabajadores);
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
        $sql="EXEC dbo.SPCagregaOfertaComercial '".$repLegal."','".$contacto."','".$empresa."','".$fecha."','".$trabajadores."','".$salario."','".$objeto."','".
            $pctRiesgo."'";
   
            $stmt =  sqlsrv_query($db, $sql);
    
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        else{
            while($row = sqlsrv_fetch_array($stmt)) {
                die(print_r(sqlsrv_errors(), true));
                //echo "OK";
            }
            sqlsrv_free_stmt($stmt);    

            sqlsrv_close($db);          

            //genero pdf oferta comercial

                $html = "
    <B>Fecha: </B>".$fecha."<br>
    <B>Oferente:</B> Universal Service S.A.S.     <B>Nit:</B> 900.066.593 - 4<br>
    <B>Dirección:</B> Calle 32B  69-16  Belén Malibù     <B>Teléfono:</B> 320 17 50 <br>
    <B>Representante Legal:</B> Luis Javier Montoya Marin <br><br>
    <B>Destinatario: </B>".$strEmpresa."     <B>Nit: </B>".$strNit."<br><!-- destinatario de la oferta -->
    <B>Gerente y/o Representante Legal: </B>".$strRepLegal."     <B>Contacto: </B>".$strContacto."<br>
    <B>Dirección: </B>".$strDireccion."     <B>Teléfono: </B>".$strTelefono."<br>
    <B>Correo Electrónico: </B>".$strMailContacto."<br>
    <B>Objeto de la Oferta: </B>".$objeto."<br><br>
    <B>Descripción de la Oferta para el  envío de <!-- NoTM -->".$trabajadores." Trabajador(es) en Misión.</B><br><br>
    <I>- Valores Trabajador en Misión</I><br>
        Valor Salario: $ ".$salario."     Salario + P.S. + S.S.: $ ".$salarioPsSs."<br><br>
    <I>- Valores Auxilio de Trasporte</I><br>
        Valor Aux. Transporte: $ ".$auxTransporte."     Aux.Transporte + P.S. + S.S.: $ ".$auxTransportePsSs."<br><br>
    <I>- Valores y Porcentajes Seguridad Social (S.S.)</I><br>
        <I>* Aportes Pensión</I><br>
            Porcentaje Aporte Pensión: 12.00%     Valor Aporte Pensión: $ ".$aportePension."<br>
        <I>* Riesgos Profesionales</I><br>
            Porcentaje Riesgo: $ ".$pctRiesgo."     Valor Riesgo: $ $ ".$aporteRiesgos."<br>
        <I>* Caja de Compensación</I><br>
            Porcentaje Caja: 4.17%     Valor Aporte Caja de Compensación: $ ".$aporteCaja."<br>
        <I>* Total  Aportes Seguridad Social</I><br>
            Porcentaje Total S.S.: 23.13%     Valor Total de Aportes S.S.: $ ".$totalSs."<br><br>
    <I>- Valores y Porcentajes Prestaciones Sociales (P.S.)</I><br>
        <I>* Cesantías:<br>
            Porcentaje Cesantías: 8.33%     Valor Aporte Cesantías: $ ".$cesantias."<br>
        <I>* Intereses a la Cesantías:</I><br>
            Porcentaje Interés Cesantías:1.00%      Valor Interés Cesantías: $ ".$intCesantias."<br>
        <I>* Prima de Servicios:</I><br>
            Porcentaje Prima Servicios: 8.33%     Valor Prima de Servicios: $ ".$primaServicios."<br>
        <I>* Vacaciones:</I><br>
            Porcentaje Vacaciones: 5.00%     Valor Vacaciones: $ ".$vacaciones."<br>
        <I>* Total Aportes P.S.:</I><br>
            Porcentaje Total P.S.: 22.66%     Valor Total Aportes P.S.: $ ".$totalPs."<br><br>
    <I>- Seguro de Vida (Opcional):</I><br>
        Porcentaje Seguro de Vida: 1.50%      Valor Seguro de Vida: $ ".$segVida."<br><br>
    <B>Valores Totales del Servicio.</B><br><br>
    <I>- Costo Mensual: </I>$".$valorMes."<br>
    <I>- Administración:</I><br>
        Porcentaje Administración: 10.00%     Valor Administración: $ ".$valorAdmon."<br>
    <I>- Imprevistos:</I><br>
        Porcentaje: 1.5%     Valor: $ ".$valorImprevistos."<br>
    <I>- IVA:</I><br>
        Porcentaje IVA: 16.00%     Valor IVA: $ ".$valorIva."<br><br>
    <B><I>Valor Total del Servicio Mensual:</I></B> $ ".$valorServicio."<br><br>
    <B>Observaciones</B><br>
    1.- La propuesta fue elaborada con base el salario reportado por el destinatario de la oferta, con un AIU  del  10%  con base en articulo 462-1  la Reforma Tributario  -Ley 1607 de 2.012- ,  por lo tanto se aplica sobre todos los conceptos que la legislación laboral estima como salario, incluida las prestaciones sociales, la seguridad social y parafiscales.
    2.- El proceso de selección del personal incluye reclutamiento de personal, pruebas psicotécnicas, entrevista con psicológico, verificación de referencias y pronostico ocupacional.
        2.1.- Para cada cargo se envían, máximo,  tres candidatos con el fin de que el cliente escoja el que mas se adapte a su compañía.
    3.-El porcentaje de cotización al sistema de riesgos profesionales puede variar conforme al riesgo al que este expuesto el personal en misión.
    4.- La nomina de los (as) trabajadores (as) en misión se pagan cada quince días, por lo tanto, Universal Service emite y envía una factura quincenal, la cual debe  ser cancelada a mas tardar diez días después de haber sido recibida por la empresa usuaria.
    5.- La presente oferta no incluye lo siguiente:
        5.1.- Valor de exámenes médicos de ingreso.
        5.2.- Dotación de Uniforme y elementos de protección personal.
        Nota: Conforme a la Resolución 2346 de 2007 es necesario que el personal que ingresa a UNIVERSAL SERVICE S.A. se realice exámenes médicos pre ingreso, por lo tanto, el proveedor y el valor de éstos será previamente acorados con la empresa usuaria.
    6.- El personal incapacitado por enfermedad general o maternidad, no podrá ser retirado del servicio, toda vez que por ley gozan de estabilidad laboral reforzada.  El retiro solo surtirá efecto una vez finalizada la incapacidad.  Durante el tiempo de la incapacidad la empresa usuaria asume el pago de las prestaciones sociales y el pago al sistema integrado de  seguridad social.
    7.- Si por cualquier circunstancia la empresa usuaria solicita vincular personal que no aprobó el proceso de selección de UNIVERSAL SERVICE, deberá autorizarlo por escrito.
    8.- El Seguro de Vida   cubre lo siguiente:
        I)Básico 10 Salarios Mensuales.
        II) Incapacidad Total y Permanente 10 Salarios Mensuales.
        III) Indemnización por muerte accidental 10 Salarios Mensuales.
        IV) Auxilio Funerario 4,5 SMLMV.<br><br><br><br><br><br><br><br>
    <B>Luis Javier Montoya</B><br>
    <I>Gerente General</I><br>
    Universal Service S.A.S."; 
            $nombreOfertaPdf = "Oferta Comercial para ".$strEmpresa." de ".$fecha.".pdf";
            $nombreRutaPdf = "\Oferta Comercial para ".$strEmpresa." de ".$fecha.".pdf";
            $destino = "C:\Users\david.garcia\Desktop\Ofertas PHP".$nombreRutaPdf;
            $str = utf8_decode($html);
            $pdf = new PDF('P','mm','Letter');
            $pdf->AddPage();
            $pdf->SetFontSize(10);
            $pdf->writeHTML($str);
            //$pdf->image('Firma.png', 15, 210, 30, 30,'PNG'); -> se quita la firma a solicitud del doctor luis
            $pdf->Output($nombreOfertaPdf,'I');
            $pdf->Output($destino,'F');
        }
    }
    
?>
