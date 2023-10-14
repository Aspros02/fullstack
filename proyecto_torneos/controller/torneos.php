<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/torneos.php");
require_once("model/juegos.php");
require_once("model/empresas.php");

class TorneosControlador
{
    static function index()
    {
        $torneos = new TorneosModelo();

        if (isset($_GET['id_empresa']))
        {
            $torneos->id_empresa = $_GET['id_empresa'];
            $torneos->SeleccionarEmpresa();
        }
        else
        $torneos->Seleccionar();

        require_once("view/torneos.php");
    }

    static function Nuevo()
    {
        $torneo = new TorneosModelo();
        $torneo->id_empresa = $_GET['id_empresa'];

        $empresas = new EmpresasModelo();
        $empresas->Seleccionar();

        $juegos = new JuegosModelo();
        $juegos->id_empresa = $_GET['id_empresa'];
        $juegos->SeleccionarParaTorneo();

        $opcion = 'NUEVO'; // Opción de insertar un torneo.
        require_once("view/torneosmantenimiento.php");
    }

    static function Insertar()
    {
        $torneo = new TorneosModelo();

        $torneo->id_empresa = $_POST['id_empresa'];
        $torneo->id_juego = $_POST['id_juego'];
        $torneo->nombre = $_POST['nombre'];
        $torneo->fecha = $_POST['fecha'];

        if ($torneo->Insertar() == 1)
        header("location:" . URLSITE . '?c=torneos&m=index&id_empresa=' . $torneo->id_empresa);
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $torneo->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Editar()
    {
        $torneo = new TorneosModelo();
        $juegos = new JuegosModelo();
        $empresas = new EmpresasModelo();

        $torneo->id = $_GET['id'];

        $opcion = 'EDITAR'; // Opción de modificar un torneo.

        if ($torneo->seleccionar() && $juegos->Seleccionar() && $empresas->Seleccionar())
            require_once("view/torneosmantenimiento.php");
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $torneo->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $torneo = new TorneosModelo();

        $torneo->id = $_GET['id'];
        $torneo->id_empresa = $_POST['id_empresa'];
        $torneo->id_juego = $_POST['id_juego'];
        $torneo->nombre = $_POST['nombre'];
        $torneo->fecha = $_POST['fecha'];

        // Aquí hay que tener cuidado, en el caso de que se pulse el botón de aceptar
        // pero no se haya modificado nada, la función modificar devolverá un cero,
        // por eso hay que comprobar que no hay error.
        if (($torneo->Modificar() == 1) || ($torneo->GetError() == ''))
            header("location:" . URLSITE . '?c=torneos&m=index&id_empresa=' . $torneo->id_empresa);
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $torneo->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $torneo = new TorneosModelo();
        $torneo->id = $_GET['id'];

        if ($torneo->Borrar() == 1)
            header("location:" . URLSITE . '?c=empresas');
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $torneo->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }
}
?>