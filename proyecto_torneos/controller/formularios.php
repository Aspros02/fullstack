<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/torneos.php");
require_once("model/formularios.php");
require_once("fpdf/fpdf.php");
require_once("pdfs/formularios.php");
require_once("pdfs/participantes.php");

class FormulariosControlador
{
    static function index()
    {
        $formularios = new FormulariosModelo();

        if (isset($_GET['id']))
        {
            $formularios->id_torneo = $_GET['id'];
            $formularios->SeleccionarTorneo();
        }
        else
        $formularios->Seleccionar();

        require_once("view/participantes.php");
    }

    static function nuevo()
    {
        $torneo = new TorneosModelo();
        $torneo->id = $_GET['id'];
        $torneo->Seleccionar();

        require_once("view/formularios.php");
    }

    static function Insertar()
    {
        $formulario = new FormulariosModelo();

        $formulario->nombre_torneo = $_POST['nombre_torneo'];
        $formulario->empresa = $_POST['empresa'];
        $formulario->juego = $_POST['juego'];
        $formulario->fecha = $_POST['fecha'];
        $formulario->nick = $_POST['nick'];
        $formulario->codigo = $_POST['codigo'];
        $formulario->id_torneo = $_POST['id_torneo'];

        if ($formulario->Insertar() == 1){
            $formulario->id = $formulario->UltimoId();

            self::Imprimir($formulario->id);
        }
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $formulario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }

    }

    static function Imprimir($id)
    {
        $pdf = new FormulariosPDF('L', 'mm', 'A5');

        // Para calcular el número total de páginas.
        $pdf->AliasNbPages();

        // Añadimos una página.
        $pdf->AddPage();

        // Ponemos fuente times y 12 pt.
        $pdf->SetFont('Courier','',12);

        $pdf->SetTitle("Ticket");

        $pdf->image('imagenes/logo.png', 72, 110, -500);

        // Nos creamos el usuario modelo, ...
        $formularios = new FormulariosModelo();

        $formularios->id = $id;

        // obtenemos todas las filas y... 
        $formularios->Seleccionar();

        // se las pasamos al PDF.
        $pdf->filas = $formularios->filas;

        // Imprimimos las filas.
        $pdf->Imprimir();

        // Abrimos el PDF creado.
        $pdf->Output('Ticket.pdf', 'D');
        
    }

    static function ImprimirParticipantes()
    {        
        $pdf = new ParticipantesPDF('L');

         // Para calcular el número total de páginas.
         $pdf->AliasNbPages();

         // Añadimos una página.
         $pdf->AddPage();
 
         $pdf->SetFont('Courier','',12);

         $pdf->SetTitle("Listado");
 
         // Nos creamos el usuario modelo, ...
         $formularios = new FormulariosModelo();

         $formularios->id_torneo = $_GET['id'];
 
         $formularios->SeleccionarTorneo();
 
         // se las pasamos al PDF.
         $pdf->filas = $formularios->filas;
 
         // Imprimimos las filas.
         $pdf->Imprimir();
 
         ob_end_clean();
         // Abrimos el PDF creado.
         $pdf->Output('Listado.pdf','D');
    }
}
?>