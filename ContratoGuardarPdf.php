<?php 
    include("conexionSqlsrv.php");
    include("validar.php");
    require("pdf2.php");
    
    $validar = new validar;
    
    //datos de la empresa
    $empresa = $_POST['emp'];
    $sqlEmpresa = "SELECT TOP 1 * FROM dbo.tblClientePotencial WHERE idPotencial =".$empresa;
    $rstEmpresa = sqlsrv_query($db,$sqlEmpresa);
    $rowEmpresa = sqlsrv_fetch_array($rstEmpresa,SQLSRV_FETCH_BOTH);
    //nombre
    $strEmpresa = $rowEmpresa['strNombre'];
    mb_strtoupper($strEmpresa);
    //var_dump($strEmpresa);
    //nit
    $strNit = $rowEmpresa['strNit'];
    //datos del rep legal
    $repLegal = $_POST['repLegal'];
    $sqlRepLegal = "SELECT TOP 1 * FROM dbo.tblContacto WHERE idContacto =".$repLegal;
    $rstRepLegal = sqlsrv_query($db,$sqlRepLegal);
    $rowRepLegal = sqlsrv_fetch_array($rstRepLegal,SQLSRV_FETCH_BOTH);
    //nombre
    $strNombre = $rowRepLegal['strNombre']." ".$rowRepLegal['strApellido'];
    mb_strtoupper($strNombre);
    //var_dump($strNombre);
    //cedula
    $strCcRepLegal = $_POST['ccRepLegal'];
    //fecha
    $dateFecha = $_POST['fecInicio'];

    $response = $validar->validarData($_POST);

    if($response){
        echo $validar->showErrors();
    }
    else{
        $sql="EXEC SPCagregarContratoServicio '".$empresa."','".$repLegal."','".$dateFecha."'";
   
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

            $pdfj=new PDF_WriteTag();
            $pdfj->SetMargins(20,20,10);
            $pdfj->SetFont('courier','',10);

            // Stylesheet
            $pdfj->SetStyle("p","courier","N",10,"0,0,0",0);
            $pdfj->SetStyle("label","courier","B",10,"0,0,0",0);
            $pdfj->SetStyle("h1","courier","B",16,"0,0,0");
            //$pdfj->SetStyle("pers","times","I",0,"255,0,0");
            //$pdfj->SetStyle("place","arial","U",0,"153,0,0");
            //$pdfj->SetStyle("vb","times","B",0,"102,153,153");            

            // Title
            $txt="<h1>Contrato de Servicios Temporales</h1>";
            //$pdfj->SetLineWidth(0.5);
            //$pdfj->SetFillColor(255,255,204);
            //$pdfj->SetDrawColor(102,0,102);
            $pdfj->WriteTag(0,10,$txt,0,"C",0,5);         

            $pdfj->Ln(12);


            $html = "<p>Entre los suscritos, LUÍS JAVIER MONTOYA MARÍN identificado con la cédula de ciudadanía número 71.225.839 de Bello, quien obra como Representante Legal de UNIVERSAL SERVICE S.A.S. con Nit 900066593-4 y domicilio principal en la ciudad de Medellín, por una parte, y por otra: ".$strNombre." identificado (a) con la cédula de ciudadanía número ".$strCcRepLegal.", quien obra en Representación Legal de ".$strEmpresa." con Nit: ".$strNit.", calidad que acredita con el certificado de  existencia y representación legal anexo a este contrato, y que en adelante se llamará EL USUARIO, han acordado suscribir el presente CONTRATO DE PRESTACION DE SERVICIO TEMPORAL DE COLABORACION,  el cual se regirá por  las clausulas que aquí mismo se consignan, conforme a las consideraciones que indican las partes, y en su defecto por las normas del Código de Comercio y en lo pertinente a los señalado en la Ley 50 de 1990 como en sus decretos reglamentarios, principalmente el decreto 4369 de 2006, o el que lo derogue, modifique, subrogue o adiciones.
    CLÁUSULA PRIMERA:OBJETO DEL CONTRATO: UNIVERSAL SERVICE S.A.S. se obliga a colaborarle temporalmente en el desarrollo de su actividad permanente  al  USUARIO mediante el  envío de Trabajadores en Misión, quienes ejecutaran su labor bajo la subordinación delegada otorgada al USUARIO en  los casos señalados en los numerales 1ro., 2do y 3ro., del  artículo 77  de la  Ley 50 de 1990 y 6to del Decreto 4369 de 2006; sin que  por esto   adquiera el carácter de empleador ,  al igual que en las labores ocasionales o transitorias a que se refiere el artículo 6to del C.S.T. El número de Trabajadores en Misión y el tiempo de duración del servicio, se determina conforme a las solicitudes de personal que realice el USUARIO.
    CLÁUSULA SEGUNDA: OBLIGACIONES Para cumplir con el objeto contractual y acorde con la naturaleza de este contrato  UNIVERSAL SERVICE S.A.S., se  obliga para con el USUARIO a lo siguiente: a)  contratar  laboralmente y por escrito el personal en misión requerido para ejecutar el servicio temporal de colaboración contratado comercialmente con el USUARIO, de modo que se ajuste a los requerimientos fijados por este, b) Verificar referencias de trabajo y  exigir al Trabajador  en Misión   la presentación de los documentos  que por políticas tenga establecido en sus procesos y además, todos aquellos que ordene el Reglamento Interno de Trabajo de UNIVERSAL SERVICE S.A.S. c) Efectuar procesos de selección  que cumplan con todos los lineamientos técnicos y profesionales para garantizar la consecución del mejor talento humano. d)  Afiliar   al trabajador en misión de forma inmediata al Sistema  Integral  de Seguridad Social.  . e) Pagar oportunamente a los trabajadores en Misión  los salarios y prestaciones sociales a que tenga derecho según la Ley, dada su calidad de único y verdadero empleador.  En todo caso, las partes declara y reconocen que de acuerdo con lo dispuesto en el artículo 71 de la Ley 50 de 1990, el Decreto 4369 de 2006 y las normas que  modifiquen, aclaren, adicionen o subroguen estas disposiciones, los trabajadores en misión no tienen vinculo laboral alguno con EL USUARIO, aunque en virtud de la naturaleza de la prestación del servicio, los trabajadores en misión adquieren el derecho a un salarió ordinario equivalente al de los trabajadores de EL USUARIO  que desempeñen la misma actividad aplicando para ello las escalas de antigüedad  vigentes de EL USUARIO.    f)  Pagar dentro de las fechas establecidas  los aportes de Seguridad Social  y  Caja de Compensación Familiar, g)  Remitir dentro de  los 10 primeros días de cada mes a  EL USUARIO  los soportes que acrediten el pago de las cotizaciones al sistema integral de seguridad social, de acuerdo con el artículo 13 del Decreto 4369 de 2006.  h)  Instruir a los trabadores en misión en cuanto al Reglamento Interno de Trabajo, Comité de Convivencia, protocolos, normas y procedimientos establecidos    tanto en  UNIVERSAL SERVICE S.A.S. como en  la empresa USUARIA, toda vez que estos trabajadores están obligados a acatar,  respetar   y  ceñirse al cumplimiento de los mismos.  i)   Evaluar de forma periódica la prestacion del servicio a fin de establecer correctivos o introducir mejoras para beneficio de las partes. j)  Auditar, vigilar y recomendar a EL USUARIO  todo lo que considere y mejore las condiciones de seguridad y salud en el trabajo de los trabajadores en misión.  k) Mantener un registro actualizado de los historiales laborales de los Trabajadores en Misión asignados a la prestación del servicio. l) Efectuar cumplidamente  la deducción por concepto de Retención en la Fuente a los   Trabajadores en Misión que de acuerdo con la Ley se les aplique, así mismo,  pagar oportunamente  los valores recaudados; m) A retirar del servicio al trabajador o trabajadores cuya remoción sea solicitada por EL USUARIO, mediante comunicación escrita y motivada de la terminación de  la  obra o labor particular, ejecutada  por el trabador en misión   n)   Constituir anualmente una póliza, a favor de los trabajadores en Misión, con una compañía de seguros legalmente establecida en Colombia para garantizar el pago de las obligaciones laborales contraídas con estos. ñ) Cumplir estrictamente las disposiciones laborales vigentes, como empleador de los Trabajadores en Misión asignados a  prestar servicio al USUARIO.
    CLÁUSULA TERCERA: OBLIGACIONES DEL USUARIO;: a) informar a UNIVERSAL SERVICE S.A.S. el tiempo laborado por los trabajadores  en Misión  asignados a su servicio y demás novedades que se presenten y que afecten el salario del trabajador en misión, tales como:  horas extras, dominicales y festivos laborados, recargos, descansos compensados y no compensados, comisiones, bonificaciones y/o auxilios salariales   b) informar inmediatamente el retiro del trabajador en misión mediante comunicación escrita y motivada, donde se  indique claramente la terminación de la obra o laborar ejecutada por el trabajador en misión. .PARAGRAFO.  Cuando el USUARIO  no reporte el retiro en forma oportuna  deberá asumir los pagos que se efectúen de mas al Trabajador en Misiòn y al Sistema Integral de Seguridad Social. c)  Vigilar y responder por  la seguridad y salud en el trabajo de los trabajadores en misión de acuerdo con los términos de Ley.  d) Acatar y atender las recomendaciones que en materia de seguridad y salud en el trabajo le realice UNIVERSAL SERVICE S.A.S.  e) Informar antes de la ejecución del contrato a UNIVERSAL SERVICE S,.AS., los examens médicos de ingreso, periódicos, de egreso y aquellos especiales que se requieran de acuerdo con la actividad permanente y los servicios contratados por  parte de  EL USUARIO .  f) Asumir el valor de la dotación legal  de uniformes  y  de  los  elementos de protección personal que requiera  utilizar el Trabajador en Misiòn en el  desarrollo de sus actividades diarias, de acuerdo con el Decreto 1530 de 1996 . g) Asumir el costo de los cinco (5) días hábiles de licencia de luto y demás causas de suspensión del contrato de trabajo consagradas en el Código Sustantivo del Trabajo, articulo 51 y 57 en su artículo sexto, al igual que el pago a la seguridad social  y las prestaciones sociales generadas durante estos  periodos h) asumir el primer dia de auxilio de incapacidad por accidente que no reconoce la administradora de riesgos laborales (ARL). i) Asumir los dos (2) primeros días de incapacidad o el que se genere dentro del periodo de urgencias, que no reconoce la Entidad Promotora de Salud (EPS), en caso de enfermedad general del Trabajador en Misión.    j) Asumir las prestaciones sociales durante el disfrute de la licencia de paternidad. k) Asumir el valor de los exámenes pre-ocupacionales l) Cancelar los valores que se facturen dentro de los plazos fijados en el presente contrato.   m) No ordenar ni permitir que el trabajador en misión trabaje horas extras que excedan los limites señalados por la Ley; n) Asumir el valor de los salarios, prestaciones sociales y aportes al sistema de seguridad social generadas por la suspensión del contrato por detención preventiva de los trabajadores en misión, siempre y cuando la decisión sea no terminar el contrato por las consecuencias que tiene si el trabajador es absuelto por el delito que dio origen a su detención. ñ) Asumir  los salarios, prestaciones sociales y aportes al sistema de seguridad social por el termino de duración de la obra o labor contratada de los trabajadores victimas de secuestro o desaparición forzada. o) Incluir los trabajadores en misión dentro de los programas culturales, recreativos, deportivos y de capacitación que trata el artículo 21 de la Ley 50;  p) Otorgar a los trabajadores en misión el goce de los beneficios que EL USUARIO tenga establecido para sus trabajadores en el lugar de trabajo, en materia de transporte, alimentación y recreación.
    CLÁUSULA CUARTA VALOR DEL CONTRATO: El USUARIO pagará a UNIVERSAL SERVICE S.A.S., por la prestación del servicio  de  colaboración temporal una suma equivalente al 10% del valor del contrato,  el cual se calcula  sobre la sumatoria que arroje el salario, mas las prestaciones sociales, la seguridad social, el seguro de vida, subsidio de transporte y todas aquellas sumas que constituya salario y  se encuentren   estipuladas como tales en el artículo 127 del Código Sustantivo del Trabajo.
    CLÁUSULA QUINTA: FORMA DE PAGO: los valores a que hace referencia la cláusula anterior serán pagados en la siguiente forma: Quincena vencida luego de efectuarse el pago a  los trabajadores en Misión, UNIVERSAL SERVICE S.A.S. le notificara a EL USUARIO  el  valor  del servicio mediante la remisión de una factura de venta   para que dicho valor le sea abonado a la cuenta corriente No.  008.289929-61  de Bancolombia.    PARAGRAFO.  Si EL USUARIO no cancela estos valores, de acuerdo a lo establecido en este contrato,  se suspenderá el pago a los trabajadores hasta tanto el depósito se haga efectivo en la cuenta  corriente  de UNIVERSAL  SERVICE S.A.S.
    CLÁUSULA SEXTA: INTERESES POR MORA: las sumas que se paguen con retardo causarán un interés equivalente al máximo legal vigente.
    CLÁUSULA SEPTIMA: REAJUSTE DEL VALOR DEL CONTRATO: En guarda del equilibrio financiero del presente contrato, en caso de incremento de los costos para UNIVERSAL SERVICE S.A.S. por razón de leyes, decretos o resoluciones de carácter oficial, el valor del presente contrato se reajustará automáticamente en la misma cantidad o proporción siendo de cargo de  EL  USUARIO  el mayor valor.
    CLÁUSULA OCTAVA: DERECHOS DE LOS TRABAJADORES EN MISIÓN. Es entendido que los trabajadores con los cuales UNIVERSAL SERVICE S.A.S. presta el servicio de colaboración temporal de que  habla la cláusula primera, son trabajadores propios por ser ella la empleadora, y respecto de los cuales, está obligada mediante contrato de trabajo, por lo tanto, tiene la responsabilidad y los derechos propios de los empleadores contenidos en la Ley 50 de 1990 y demás normas laborales aplicables. En consecuencia, UNIVERSAL SERVICE S.A.S. se sujetará a lo dispuesto por la Ley para efectos del pago de salarios, prestaciones sociales, horas extras, recargos diurnos y nocturnos, dominicales y festivos.
    CLAUSULA NOVENA FUERO ESPECIAL DE MATERNIDAD E INCAPACIDAD.  En   consideración al fuero especial de maternidad e incapacidad  laboral que ha concedido la Ley a:  1) la mujer en estado de embarazo y el cual se extiende hasta el periodo de lactancia, 2) A los incapacitados por accidente de trabajo, por enfermedad general, o enfermedad profesional, y el cual se extiende hasta la curación, la reubicación, la calificación de perdida laboral o la obtención de la pensión de invalidez, UNIVERSAL SERVICE S.A.S.,  NO podrá  desvincular a los trabajadores en misión que se encuentren en estas circunstancias , por  lo tanto durante este periodo EL USUARIO mantendrá y asumirá los salarios, prestaciones sociales y aportes al sistema  integral   de seguridad social de los trabajadores en Misión en los mencionados estados, hasta terminar su periodo de lactancia, curación, reubicación u otorgamiento de la pensiona de invalidez.
    <label>CLÁUSULA DECIMA: EXCLUSIVIDAD DE LA LABOR: Los trabajadores en misión  no podrán ser destinados bajo ninguna circunstancia por EL  USUARIO para el desempeño de una labor distinta de aquella para la cual fue enviada en misión.</label>
    CLÁUSULA DÉCIMA  PRIMERA: SALUD OCUPACIONAL: Sin perjuicio de la responsabilidad legal de UNIVERSAL SERVICE S.A.S. como empleador de sus trabajadores en misión, EL  USUARIO de manera solidaria,  se obliga a que los sitios de trabajo cumplan las exigencias de la legislación en materia de  Salud  y seguridad en el trabajo  y a lo siguiente:  a) Suministrar a los trabajadores en misión los implementos de seguridad correspondientes para conservar su salud, b) suministrar periódicamente a UNIVERSAL SERVICE S.A.S.  la documentación que acredite el cumplimiento de las normas de Seguridad y salud  en el trabajo de los trabajadores en misión, c) Informar inmediatamente a UNIVERSAL SERVICE S.A.S. en caso de accidente de un trabajador en misión,  d) otorgar a  los trabajadores en misión la misma protección que en materia de Salud Ocupacional gocen los trabajadores permanentes de EL  USUARIO,  e) Impartir  a los trabajadores en misión, cuando esta se cumpla en oficio o actividades particulares riesgosas,  (trabajo en alturas, trabajos eléctricos, trabajos en caliente o en espacios confinados)  la protección,  entrenamiento  y adiestramiento  necesarios, dejando registro y evidencia del mismo, a fin de evitar accidentes o enfermedades  profesionales. PARAGRAFO: Expresamente se prohíbe al  USUARIO cambiar de oficio o actividad al trabajador en misión; de requerir que el trabajador  en misión cambie de oficio o realice una actividad diferente para aquella en la cual fue enviado en misión deberá notificarlo por escrito a  UNIVERSAL SERVICES S.A.S. y esperar que esta como único y verdadero empleador autorice por escrito el cambio de oficio o actividad de su trabajador.   f) EL USUARIO  deberá  informar el centro de trabajo en el cual el trabajador en misión desempeñara la labor para garantizar que la cotización a la ARL sea la correcta  de acuerdo con el riesgo al cual estará expuesto el trabajador enviado en misión.  g)  Cuando  EL USUARIO requiera  que el trabajador enviado en misión realice labores consideradas de alto riesgo, deberá notificarlos a UNIVERSAL SERVICE S.A.S, para que esta coordine la realización de los exámenes de pre-empleo, o ingreso específicos para la labor a realizar y apruebe si el trabajador es apto o no para dicha labor de acuerdo con el concepto medico ocupacional.  El valor de estos exámenes al igual que  los de ingreso será asumido directamente por la  empresa usuaria del servicio.  PARAGRAFO: El USUARIO deberá pagar a UNIVERSAL SERVICE S.A.S. cualquier erogación que éste tuviera por el incumplimiento de lo pactado, especialmente en materia de seguridad y salud en el trabajo.
    CLÁUSULA DÉCIMA SEGUNDA : MANEJO DE VALORES Y VEHÍCULOS: UNIVERSAL SERVICE S.A. no asume responsabilidad por el manejo o transporte de valores encomendados a sus trabajadores en misión. En caso de que la EMPRESA USUARIA lo decidiera podrá contratar a su costo, seguros que amparen esos valores (opcional). La responsabilidad contractual o extracontractual frente a terceros que se derive de la operación del transporte de personas o bienes, será asumida directamente por el USUARIO.
    CLÁUSULA DÉCIMA TERCERA   : PÓLIZA DE CUMPLIMIENTO: Para garantizar el cumplimiento de las obligaciones laborales con los trabajadores en misión, UNIVERSAL SERVICE S.A.S. ha constituido con la compañía Seguros del Estado S.A. la póliza No. 21-43-101011090 con  vigencia comprendida entre el primero de enero de 2014 al 31 de diciembre del 2014, por un monto de SEISCIENTOS SETENTA Y SIETE MILONES SEISCIENTOS VEINTE Y  NUEVE MIL SETECIENTOS PESOS M.L.  ($677.629.700).
    CLÁUSULA DÉCIMA CUARTA : SOLUCION DE CONFLICTOS: Las diferencias entre las partes que ocurran con ocasión del presente contrato, se someterán en un principio al proceso de conciliación   directa entre las partes, en caso de no ser resueltas las controversias  se acudirá a la justicia ordinaria.
    CLÁUSULA DÉCIMA QUINTA  : DURACIÓN: Acorde con el objeto del  presente contrato, tendrá una duración conforme al plazo previsto en artículo 77 de la Ley 50 de 1990., no obstante,  cualquiera de las partes puede darlo por terminado dando aviso a la otra parte con treinta (30) días de anticipación a la fecha en la cual desea terminarlo.
    En consecuencia se firma en la ciudad de Medellín, en ".$dateFecha."</p>";

            $nombreOfertaPdf = "Contrato para ".$strEmpresa." de ".$dateFecha.".pdf";
            $nombreRutaPdf = "\Contrato para ".$strEmpresa." de ".$dateFecha.".pdf";
            $destino = "C:\Users\david.garcia\Desktop\Contratos PHP".$nombreRutaPdf;
            $txt = utf8_decode($html);
            $pdfj->AddPage();
            $pdfj->SetLineWidth(0.1);
            $pdfj->SetFillColor(255,255,255);
            $pdfj->SetDrawColor(0,0,0);
            $pdfj->WriteTag(0,5,$txt,0,"J",0,0);            

            $pdfj->Ln(5);           

            // Signature
            //$txt="<a href='http://www.pascal-morin.net'>Done by Pascal MORIN</a>";
            //$pdfj->WriteTag(0,10,$txt,0,"R");         

            //$pdfj->Output();
            //$pdf->image('Firma.png', 15, 210, 30, 30,'PNG');
            $pdfj->Output($nombreOfertaPdf,'I');
            $pdfj->Output($destino,'F');
        }
    }
    
?>  