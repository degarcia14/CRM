<?php
require('../fpdf.php');

class PDF extends FPDF
{
var $B;
var $I;
var $U;
var $HREF;

function Header()
{
	// Logo
	$this->Image('logo.png',5,10,50);
	// Arial bold 15
	$this->SetFont('Arial','',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(75,25,'OFERTA COMERCIAL',0,0,'C');
	$this->Ln(10);
	// Subtitulo
	$this->Cell(80);
	$this->Cell(75,25,'SGC-REG-42 / Actualización: 3 / Abril  2.014 ',0,0,'C');
	// Salto de línea
	$this->Ln(20);
}

function Footer()
{
	// Posición a 1,5 cm del final
	$this->SetY(-15);
	// Arial itálica 8
	$this->SetFont('Arial','I',7);
	// Color del texto en gris
	$this->SetTextColor(128);
	// Número de página
	$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function PDF($orientation='P', $unit='mm', $size='Letter')
{
	// Llama al constructor de la clase padre
	$this->FPDF($orientation,$unit,$size);
	// Iniciación de variables
	$this->B = 0;
	$this->I = 0;
	$this->U = 0;
	$this->HREF = '';
}

function WriteHTML($html)
{
	// Intérprete de HTML
	$html = str_replace("\n",' ',$html);
	$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);

	foreach($a as $i=>$e)
	{
		if($i%2==0)
		{
			// Text
			if($this->HREF)
				$this->PutLink($this->HREF,$e);
			else
				$this->Write(5,$e);
		}
		else
		{
			// Etiqueta
			if($e[0]=='/')
				$this->CloseTag(strtoupper(substr($e,1)));
			else
			{
				// Extraer atributos
				$a2 = explode(' ',$e);
				$tag = strtoupper(array_shift($a2));
				$attr = array();
				foreach($a2 as $v)
				{
					if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
						$attr[strtoupper($a3[1])] = $a3[2];
				}
				$this->OpenTag($tag,$attr);
			}
		}
	}
}

function OpenTag($tag, $attr)
{
	// Etiqueta de apertura
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,true);
	if($tag=='A')
		$this->HREF = $attr['HREF'];
	if($tag=='BR')
		$this->Ln(5);
}

function CloseTag($tag)
{
	// Etiqueta de cierre
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,false);
	if($tag=='A')
		$this->HREF = '';
}

function SetStyle($tag, $enable)
{
	// Modificar estilo y escoger la fuente correspondiente
	$this->$tag += ($enable ? 1 : -1);
	$style = '';
	foreach(array('B', 'I', 'U') as $s)
	{
		if($this->$s>0)
			$style .= $s;
	}
	$this->SetFont('',$style);
}
}

$html = "
	<B>Oferente:</B> Universal Service S.A.S.     <B>Nit:</B> 900.066.593 - 4<br>
	<B>Dirección:</B> Calle 32B  69-16  Belén Malibù     <B>Teléfono:</B> 320 17 50 <br>
	<B>Representante Legal:</B> Luis Javier Montoya Marin <br><br>
	<B>Destinatario:</B>     <B>Nit:</B><br><!-- destinatario de la oferta -->
	<B>Gerente y/o Representante Legal:</B>     <B>Contacto:</B><br>
	<B>Dirección:</B>     <B>Teléfono:</B><br>
	<B>Correo Electrónico:</B><br>
	<B>Objeto de la Oferta:</B><br><br>
	<B>Descripción de la Oferta para el  envío <!-- NoTM --> de Trabajadores en Misión.</B><br><br>
	<I>- Valores Trabajador en Misión</I><br>
	    Valor Salario:	-	Salario + P.S. + S.S.:<br><br>
	<I>- Valores Auxilio de Trasporte</I><br>
	    Valor Aux. Transporte:	-	Aux.Transporte + P.S. + S.S.:<br><br>
	<I>- Valores y Porcentajes Seguridad Social (S.S.)</I><br>
	    <I>- Aportes Pensión</I><br>
		    Porcentaje Aporte Pensión: 12.00%	-	Valor Aporte Pensión:<br>
	    <I>- Riesgos Profesionales</I><br>
		    Porcentaje Riesgo: 6.960%	-	Valor Riesgo:<br>
	    <I>- Caja de Compensación</I><br>
		    Porcentaje Caja: 4.17%	-	Valor Aporte Caja de Compensación:<br>
	    <I>- Total	Aportes Seguridad Social</I><br>
		    Porcentaje Total S.S.: 23.13%	-	Valor Total de Aportes S.S.:<br><br>
	<I>- Valores y Porcentajes Prestaciones Sociales (P.S.)</I><br>
	    <I>- Cesantías:<br>
	        Porcentaje Cesantías: 8.33% 	-	Valor Aporte Cesantías:<br>
	    <I>- Intereses a la Cesantías:</I><br>
	        Porcentaje Interés Cesantías:1.00%	-	Valor Interés Cesantías:<br>
	    <I>- Prima de Servicios:</I><br>
	        Porcentaje Prima Servicios: 8.33%	-	Valor Prima de Servicios:<br>
	    <I>- Vacaciones:</I><br>
	        Porcentaje Vacaciones: 5.00%	-	Valor Vacaciones:<br>
	<I>- Total Aportes P.S.:</I><br>
	    <I>- Porcentaje Total P.S.: 22.66%	-	Valor Total Aportes P.S.:<br><br>
	<I>- Seguro de Vida (Opcional):</I><br>
	    Porcentaje Seguro de Vida: 1.50%	-	Valor Seguro de Vida:<br><br>
	<B>Valores Totales del Servicio.</B><br><br>
	<I>- Costo Mensual:</I><br>
	<I>- Administración:</I><br>
	    Porcentaje Administración: 10.00%	-	Valor Administración:<br>
	<I>- Imprevistos:</I><br>
	    Porcentaje: 1.5%	-	Valor:<br>
	<I>- IVA:</I><br>
	    Porcentaje IVA: 16.00%	-	Valor IVA:<br><br>
	<B><I>Valor Total del Servicio Mensual:</I></B><br><br>
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
	Universal Service S.A.S.Empresa Usuaria";
				
$pdf = new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFontSize(10);
$pdf->writeHTML($html);
$pdf->Output();
?>
