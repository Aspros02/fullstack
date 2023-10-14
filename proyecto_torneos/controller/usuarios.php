<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/usuarios.php");
require_once("model/bd.php");
require_once('controller/crypt.php');

class UsuariosControlador
{
    static function index()
    {
        $usuarios = new UsuariosModelo();

        $usuarios->Seleccionar();

        require_once("view/usuarios.php");
    }

    static function Nuevo()
    {
        $opcion = 'NUEVO'; // Opción de insertar un usuario.

        require_once("view/usuariosmantenimiento.php");
    }

    static function Insertar()
    {
        $usuario = new UsuariosModelo();

        $usuario->usuario = $_POST['usuario'];
        $usuario->contrasena = CRYPT::Encriptar($_POST['contrasena']);
        $usuario->nombre = $_POST['nombre'];
        $usuario->admin = $_POST['admin'];
          
        if ($usuario->Insertar() == 1)
        {
            header("location:" . URLSITE . '?c=usuarios');
        }
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Editar()
    {
        $usuario = new UsuariosModelo();

        $usuario->id = $_GET['id'];

        $opcion = 'EDITAR'; // Opción de modificar un cliente.

        // Al pasarle el 'id' solo traeremos ese cliente.
        if ($usuario->seleccionar())
            require_once("view/usuariosmantenimiento.php");
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $usuario = new UsuariosModelo();

        $usuario->id = $_GET['id'];
        $usuario->usuario = $_POST['usuario'];
        $usuario->contrasena = CRYPT::Encriptar($_POST['contrasena']);
        $usuario->nombre = $_POST['nombre'];
        $usuario->admin = $_POST['admin'];

        if (($usuario->Modificar() == 1) || ($usuario->GetError() == ''))
            header("location:" . URLSITE . '?c=usuarios');
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $usuario = new UsuariosModelo();
        
        $usuario->id = $_GET['id'];

        if ($usuario->Borrar() == 1)
            header("location:" . URLSITE . '?c=usuarios');
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }
}
?>