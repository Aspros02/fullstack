<?php
require_once('fpdf/fpdf.php');

class ParticipantesPDF extends FPDF
{
    public $filas;

    // Cabecera de página
    function Header()
    {
        // Ponemos el título de la página
        $this->SetFont('Courier','B',14);
        $this->Cell(277, 10,'LISTADO DE PARTICIPANTES', 1, 0, 'C');

        // Ponemos el título de las celdas
        $this->SetXY(10, 20);                              
        $this->SetFillColor(226,188,16);                    
        $this->SetTextColor(255,255,255);                  
        $this->Cell(80, 10, 'Nick', 1, 0, 'C', true);
        $this->Cell(120, 10, 'Codigo', 1, 0, 'C', true);
        $this->Cell(77, 10, 'Fecha', 1, 0, 'C', true);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1 cm del final de la página
        $this->SetY(-13);

        // Arial italic 8
        $this->SetFont('Courier','',10);

        // Fecha y hora
        $fechayhora = date('d/m/Y - H:i');
        $this->Cell(50, 10, $fechayhora, 0, 0, 'L');

        // Número de página
        $this->Cell(227,10,
                    utf8_decode('Página '.$this->PageNo().'/{nb}'), // para que se vea bien decodificamos
                    0,0,'R');
    }

    public function Imprimir()
    {
        // Si tenemos filas a imprimir
        if ($this->filas) 
        {
            $nuevaPagina = 1;  // Control de salto de página.
            $color = 1;        // Para poner las filas en color alternativo 

            foreach ($this->filas as $fila) 
            {
                // Salto de línea
                $this->Ln();

                // Filas pares en gris e impares en blanco
                if ($color++ % 2 == 0)
                    $this->SetFillColor(219, 211, 175);
                else
                    $this->SetFillColor(255,255,255);                

                $this->Cell(80, 25, $fila->nick, 1, 0, 'C', true);
                $this->Cell(120, 25, $fila->codigo, 1, 0, 'C', true);
                $this->Cell(77, 25, $fila->fecha, 1, 0, 'C', true);

                // Cada 5 filas hacemos un salto de página.
                if ($nuevaPagina++ % 5 == 0)
                {
                    $fotoY = 32;

                    $this->AddPage();
                }
            }
        }        
    }
}
?>