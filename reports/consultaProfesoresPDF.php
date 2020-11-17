<?php
/*session_status();
include('../funciones.php');
if(!logueado()){
    header('Location: ../login.php');

    die();
}*/

require_once('../plugins/FPDF/fpdf.php');
require_once('../models/consultasProfesoresBD.php');


class consultaProfesoresPDF extends FPDF
{
    var $widths;
    var $aligns;

    var $alineacionPropia = array('L','L','L','C');
    var  $widthsPropio = array(20,30,30,40,20,20,20,10);

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data, $fill)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h, $fill);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }


    /*PASOS: 
    210 altura 297 anchura de un folio A4.
    1º Definir anchura de las celdas (WORD)
    2º Título(Header)(Color, fuente, tamaño) //LISTADO DE USUARIO
    3º Filas (Color, fuente, tamaño) //USUARIO; CONTRASEÑA; EMAIL, ROL
    4º Footer (Color,fuente, tamaño) // DATOS
    */ 

    function Header()
    {
        $this->Image('../policia.png',18,8,20);
        $this->SetXY(10,10);
        $this->SetFont('Arial','B', 15);
        $this->SetTextColor(0,68,185); //color listado de usuarios
        $this->Cell(0,25,'Listado de alumnos',0,0,'C',false);

        $this->SetLineWidth(0.3);
        $this->SetFillColor(0,68,185); //color encabezado 
        $this->SetDrawColor(0); //color lineas
        $this->SetTextColor(255);
        
        
        //Cabecera
        $this->SetFont('Arial', 'B' , 9);
        $this->SetXY(10, 40);
        $this->Cell($this->widthsPropio[0], 5, 'Matricula', 1, 0, 'C', true); //anchura. altura, nombre, borde, salto de linea, alineacion, 
        $this->SetXY(30,40);
        $this->Cell($this->widthsPropio[1], 5, utf8_decode('Nombre'), 1, 0 , 'C', true);
        $this->SetXY(60,40);
        $this->Cell($this->widthsPropio[2],5,utf8_decode('Apellidos'), 1, 0, 'C', true);
        $this->SetXY(90,40);
        $this->Cell($this->widthsPropio[3],5,'Email', 1, 0, 'C', true);
        $this->SetXY(130,40);
        $this->Cell($this->widthsPropio[4],5,'Telefono', 1, 0, 'C', true);
        $this->SetXY(150,40);
        $this->Cell($this->widthsPropio[5],5,'Modalidad', 1, 0, 'C', true);
        $this->SetXY(170,40);
        $this->Cell($this->widthsPropio[6],5,'Presencial', 1, 0, 'C', true);
        $this->SetXY(190,40);
        $this->Cell($this->widthsPropio[7],5,'Curso', 1, 0, 'C', true);
        $this->Ln(); //Saltamos una linea
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(95,10,utf8_decode('Página') . $this->PageNo() . ' de {nb}','T',0,'',false);
        $this->Cell(95,10,date("d/m/Y") ,'T',0,'R',false);
    }

    function imprimir()
    {
        $fill = 0;
        //Filas
        $this->SetTextColor(0);
        $this->SetFillColor(96,138,202); //color filas,par poder poner color a las filas una si otra no mirar funcion row, a la cual le pasamos fill
        $this->SetFont('Arial','', 9);
        $this->SetAligns($this->alineacionPropia);
        $this->SetWidths($this->widthsPropio);

        //Mostrando los datos
        $alumnos = new CAlumnosBD();
        if ($alumnos->seleccionar())
        {
            foreach($alumnos->filas as $fila)
            {
                $this->Row(array(utf8_decode($fila->n_matricula),
                $fila->nombre,
                utf8_decode($fila->apellidos),
                $fila->email,
                $fila->telefono,
                $fila->DAW ? utf8_decode('DAW') : 'DAM',
                $fila->presencial ? utf8_decode('Presencial') : 'No',
                $fila->curso
            ),($fill % 2 == 0 ? 'F' : ''));
            $fill++;
            }
        }
    }
}
$opcion = filter_input(INPUT_GET,'o');
$pdf = new alumnosPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->imprimir();
$pdf->Output($opcion,'alumnos.pdf');



?>