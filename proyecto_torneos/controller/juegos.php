<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/juegos.php");
require_once("model/empresas.php");
require_once("model/categorias.php");
require_once("model/torneos.php");

class JuegosControlador
{
    static function index()
    {
        $juegos = new JuegosModelo();
        $categorias = new CategoriasModelo();

        if (isset($_GET['id_empresa']))
        {
            $juegos->id_empresa = $_GET['id_empresa'];
            $juegos->SeleccionarEmpresa();
        }
        else
            $juegos->Seleccionar();

        require_once("view/juegos.php");
    }

    static function Nuevo()
    {
        $empresas = new EmpresasModelo();
        $categorias = new CategoriasModelo();

        $empresas->Seleccionar();
        $categorias->Seleccionar();

        $juegos = new JuegosModelo();
        $juegos->id_empresa = $_GET['id_empresa'];

        $opcion = 'NUEVO'; // Opción de insertar un juego.
        require_once("view/juegosmantenimiento.php");
    }

    static function Insertar()
    {
        $juegos = new JuegosModelo();

        $juegos->id_empresa = $_POST['id_empresa'];
        $juegos->nombre = $_POST['nombre'];
        $juegos->id_categoria = $_POST['id_categoria'];

        if ($juegos->Insertar() == 1)
            header("location:" . URLSITE . '?c=juegos&m=index&id_empresa=' . $juegos->id_empresa);
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $juegos->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Editar()
    {
        $juegos = new JuegosModelo();
        $empresas = new EmpresasModelo();
        $categorias = new CategoriasModelo();

        $juegos->id = $_GET['id'];

        $opcion = 'EDITAR'; // Opción de modificar un juego.

        if ($juegos->Seleccionar() && $empresas->Seleccionar() && $categorias->Seleccionar())
            require_once("view/juegosmantenimiento.php");
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $juegos->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $juegos = new JuegosModelo();

        $juegos->id = $_GET['id'];
        $juegos->id_empresa = $_POST['id_empresa'];
        $juegos->nombre = $_POST['nombre'];
        $juegos->id_categoria = $_POST['id_categoria'];


        // Aquí hay que tener cuidado, en el caso de que se pulse el botón de aceptar
        // pero no se haya modificado nada, la función modificar devolverá un cero,
        // por eso hay que comprobar que no hay error.
        if (($juegos->Modificar() == 1) || ($juegos->GetError() == ''))
            header("location:" . URLSITE . '?c=juegos&m=index&id_empresa=' . $juegos->id_empresa);
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $juegos->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $juegos = new JuegosModelo();
        $juegos->id = $_GET['id'];

        if ($juegos->Borrar() == 1)
            header("location:" . URLSITE . '?c=empresas');
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $juegos->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }
}
?>