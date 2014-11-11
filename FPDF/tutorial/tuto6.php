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
	// T�tulo
	$this->Cell(75,25,'OFERTA COMERCIAL',0,0,'C');
	$this->Ln(10);
	// Subtitulo
	$this->Cell(80);
	$this->Cell(75,25,'SGC-REG-42 / Actualizaci�n: 3 / Abril  2.014 ',0,0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

function Footer()
{
	// Posici�n a 1,5 cm del final
	$this->SetY(-15);
	// Arial it�lica 8
	$this->SetFont('Arial','I',7);
	// Color del texto en gris
	$this->SetTextColor(128);
	// N�mero de p�gina
	$this->Cell(0,10,'P�gina '.$this->PageNo(),0,0,'C');
}

function PDF($orientation='P', $unit='mm', $size='Letter')
{
	// Llama al constructor de la clase padre
	$this->FPDF($orientation,$unit,$size);
	// Iniciaci�n de variables
	$this->B = 0;
	$this->I = 0;
	$this->U = 0;
	$this->HREF = '';
}

function WriteHTML($html)
{
	// Int�rprete de HTML
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
	<B>Direcci�n:</B> Calle 32B  69-16  Bel�n Malib�     <B>Tel�fono:</B> 320 17 50 <br>
	<B>Representante Legal:</B> Luis Javier Montoya Marin <br><br>
	<B>Destinatario:</B>     <B>Nit:</B><br><!-- destinatario de la oferta -->
	<B>Gerente y/o Representante Legal:</B>     <B>Contacto:</B><br>
	<B>Direcci�n:</B>     <B>Tel�fono:</B><br>
	<B>Correo Electr�nico:</B><br>
	<B>Objeto de la Oferta:</B><br><br>
	<B>Descripci�n de la Oferta para el  env�o <!-- NoTM --> de Trabajadores en Misi�n.</B><br><br>
	<I>- Valores Trabajador en Misi�n</I><br>
	    Valor Salario:	-	Salario + P.S. + S.S.:<br><br>
	<I>- Valores Auxilio de Trasporte</I><br>
	    Valor Aux. Transporte:	-	Aux.Transporte + P.S. + S.S.:<br><br>
	<I>- Valores y Porcentajes Seguridad Social (S.S.)</I><br>
	    <I>- Aportes Pensi�n</I><br>
		    Porcentaje Aporte Pensi�n: 12.00%	-	Valor Aporte Pensi�n:<br>
	    <I>- Riesgos Profesionales</I><br>
		    Porcentaje Riesgo: 6.960%	-	Valor Riesgo:<br>
	    <I>- Caja de Compensaci�n</I><br>
		    Porcentaje Caja: 4.17%	-	Valor Aporte Caja de Compensaci�n:<br>
	    <I>- Total	Aportes Seguridad Social</I><br>
		    Porcentaje Total S.S.: 23.13%	-	Valor Total de Aportes S.S.:<br><br>
	<I>- Valores y Porcentajes Prestaciones Sociales (P.S.)</I><br>
	    <I>- Cesant�as:<br>
	        Porcentaje Cesant�as: 8.33% 	-	Valor Aporte Cesant�as:<br>
	    <I>- Intereses a la Cesant�as:</I><br>
	        Porcentaje Inter�s Cesant�as:1.00%	-	Valor Inter�s Cesant�as:<br>
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
	<I>- Administraci�n:</I><br>
	    Porcentaje Administraci�n: 10.00%	-	Valor Administraci�n:<br>
	<I>- Imprevistos:</I><br>
	    Porcentaje: 1.5%	-	Valor:<br>
	<I>- IVA:</I><br>
	    Porcentaje IVA: 16.00%	-	Valor IVA:<br><br>
	<B><I>Valor Total del Servicio Mensual:</I></B><br><br>
	<B>Observaciones</B><br>
	1.- La propuesta fue elaborada con base el salario reportado por el destinatario de la oferta, con un AIU  del  10%  con base en articulo 462-1  la Reforma Tributario  -Ley 1607 de 2.012- ,  por lo tanto se aplica sobre todos los conceptos que la legislaci�n laboral estima como salario, incluida las prestaciones sociales, la seguridad social y parafiscales.
	2.- El proceso de selecci�n del personal incluye reclutamiento de personal, pruebas psicot�cnicas, entrevista con psicol�gico, verificaci�n de referencias y pronostico ocupacional.
	    2.1.- Para cada cargo se env�an, m�ximo,  tres candidatos con el fin de que el cliente escoja el que mas se adapte a su compa��a.
	3.-El porcentaje de cotizaci�n al sistema de riesgos profesionales puede variar conforme al riesgo al que este expuesto el personal en misi�n.
	4.- La nomina de los (as) trabajadores (as) en misi�n se pagan cada quince d�as, por lo tanto, Universal Service emite y env�a una factura quincenal, la cual debe  ser cancelada a mas tardar diez d�as despu�s de haber sido recibida por la empresa usuaria.
	5.- La presente oferta no incluye lo siguiente:
	    5.1.- Valor de ex�menes m�dicos de ingreso.
	    5.2.- Dotaci�n de Uniforme y elementos de protecci�n personal.
	    Nota: Conforme a la Resoluci�n 2346 de 2007 es necesario que el personal que ingresa a UNIVERSAL SERVICE S.A. se realice ex�menes m�dicos pre ingreso, por lo tanto, el proveedor y el valor de �stos ser� previamente acorados con la empresa usuaria.
	6.- El personal incapacitado por enfermedad general o maternidad, no podr� ser retirado del servicio, toda vez que por ley gozan de estabilidad laboral reforzada.  El retiro solo surtir� efecto una vez finalizada la incapacidad.  Durante el tiempo de la incapacidad la empresa usuaria asume el pago de las prestaciones sociales y el pago al sistema integrado de  seguridad social.
	7.- Si por cualquier circunstancia la empresa usuaria solicita vincular personal que no aprob� el proceso de selecci�n de UNIVERSAL SERVICE, deber� autorizarlo por escrito.
	8.- El Seguro de Vida   cubre lo siguiente:
	    I)B�sico 10 Salarios Mensuales.
	    II) Incapacidad Total y Permanente 10 Salarios Mensuales.
	    III) Indemnizaci�n por muerte accidental 10 Salarios Mensuales.
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
