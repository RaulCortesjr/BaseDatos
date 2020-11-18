<?php
require_once("../funciones.php");
require_once("../models/consultaProfesoresBD.php");

require_once('../plugins/fpdf/fpdf.php');

 
$id_sacar=null;

if($_SERVER['REQUEST_METHOD']=='GET'){
    $id_sacar= filter_input(INPUT_GET,'id');
    $opcion = filter_input(INPUT_GET,'o');
}


class filtrosPDF extends FPDF
{
    public $header;
    public $w;

    function empezar($sql_entrante){
        $consultas= new cconsultasbs();
        //die($sql_entrante);
        // Títulos de las columnas
        $this->header= array('Nombre Profesor',
                            'Apellidos',
                            'Email',
                            'CP',
                            'Poblacion' ,
                            'Provincia',
                            'Clase',
                            'Nombre Asignatura',
                            'Curso');
        // Carga de datos
        $consultas->seleccionar($sql_entrante);
        
        $data = $consultas->filas;
        $this->AliasNbPages();
        
        $this->SetFont('Arial','',12);
        $this->AddPage('L');
        $this->imprimir($data);
        $this->Output('I','DatosAlumnosFiltrados'.date('dmY').'.pdf',true);
    }
    function Header()
    {

        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(255,255,255);
        $this->SetFont('','B');
        $this->SetFontSize('20');
        $this->SetLineWidth(.3);

       

        $this->SetXY(10, 5);

        $this->Cell(200,15,utf8_decode("Lista Filtrada"),15,0,'L',false);
        
        //$this->SetXY(100000000, 5000);
        //$this->Image('../media/logotipo.jpg',170,6,33);


        $this->Ln();

        //Segundo
        $this->SetFontSize('8');
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetFont('','B');

        $this->SetXY(10, 28);

        $auxHeader=$this->header;
        $wAux=array(30, 30, 40, 45, 20, 20, 20, 30, 20); //tamaño titulo
        for($y=0;$y<count($auxHeader);$y++){
            $this->Cell($wAux[$y],7,$auxHeader[$y],1,0,'C',true);
        }


        $this->SetXY(40, 35);
    }
    function Footer()
    {
        $this->SetX(10);
        $wAux=array(30, 30, 40, 45, 20, 20, 20, 30,20); //borde tiene que coincidir para que este lleno
        $this->Cell(array_sum($wAux),0,'','T');

        $this->Ln();

        $this->SetDrawColor(0,0,0);
        $this->SetXY(10, 280);
        $this->Cell(0,0,'','T');
        
        $this->Ln();

        //Segundo
        $this->Cell(0,15, date("d/m/Y"),15,0,'L',false);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,15,'Pagina '.$this->PageNo().' de {nb}',15,0,'R',false);
        }
    // Tabla coloreada
    function imprimir($data)
    {
        $this->SetXY(10, 35);
        $this->SetFontSize('8');
        $this->SetDrawColor(128,0,0);
        $this->SetFont('','B');
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        $e=0;
        

        $wAux=array(30, 30, 40, 45, 20, 20, 20, 30, 20); //filas tamaño
        //print_r($wAux);
        if(!empty($data)){
            foreach($data as $row)
            {
                $this->Cell($wAux[0],6,$row->nombre_profesor,'LR',0,'L',$fill);
                $this->Cell($wAux[1],6,$row->apellidos,'LR',0,'R',$fill);
                $this->Cell($wAux[2],6,$row->email,'LR',0,'R',$fill);
                $this->Cell($wAux[3],6,$row->cp,'LR',0,'R',$fill);
                $this->Cell($wAux[4],6,$row->poblacion,'LR',0,'R',$fill);
                $this->Cell($wAux[5],6,$row->provincia,'LR',0,'R',$fill);
                $this->Cell($wAux[6],6,$row->clase,'LR',0,'R',$fill);
                $this->Cell($wAux[7],6,$row->nombre_asignatura,'LR',0,'R',$fill);
                $this->Cell($wAux[8],6,$row->curso,'LR',0,'R',$fill);          
                $this->Ln();
                $fill = !$fill;
            }
        }
    }
}
$pdf = new filtrosPDF();

?>