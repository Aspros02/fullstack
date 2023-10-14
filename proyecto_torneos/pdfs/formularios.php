<?php
require_once('fpdf/fpdf.php');

class FormulariosPDF extends FPDF
{
    public $filas;

    // Cabecera de página
    function Header()
    {
        // Ponemos el título de la página
        $this->SetFont('Courier','B',14);
        $this->Cell(190, 10,'Ticket de Torneo', 0, 0, 'R');

        // Ponemos el título de las celdas
        $this->SetXY(10, 20);                              
        $this->SetFillColor(226,188,16);                    
        $this->SetTextColor(255,255,255);                  
        $this->Cell(100, 8, 'Torneo', 1, 0, 'C', true);
        $this->Cell(90, 8, 'Nick', 1, 0, 'C', true);
    }


    public function Imprimir()
    {
        // Si tenemos filas a imprimir
        if ($this->filas) 
        {
            foreach ($this->filas as $fila) 
            {
                // Salto de línea
                $this->Ln();

                $this->SetFillColor(255,255,255);                

                $this->Cell(100, 20, $fila->nombre_torneo, 1, 0, 'C', true);
                $this->Cell(90, 20, $fila->nick, 1, 0, 'C', true);
                $this->Ln();
                $this->SetFont('Courier','B',14);
                $this->SetFillColor(226,188,16);
                $this->Cell(190, 8, 'Codigo', 1, 0, 'C', true);
                $this->Ln();
                $this->Cell(190, 20, $fila->codigo, 1, 0, 'C', true);
                $this->Ln();
                $this->SetFillColor(226,188,16); 
                $this->Cell(190, 10, $fila->fecha, 0, 0, 'R');
            }
        }
        
        
    }
}
?>