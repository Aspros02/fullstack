<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/login.php");
require_once("model/usuarios.php");

class LoginControlador
{
    static function loguearse()
    {
        $login = new LoginModelo();

        $login->usuario = $_POST['usuario'];
        $login->contrasena = $_POST['contrasena'];

        if ($login->Loguearse() === true)
        {
            header('Location:' . URLSITE . '?c=empresas');
            return;
        }

        header('Location: ' . URLSITE . 'view/login.php');
    }

    static function Logueado()
    {
        // Si no estoy logueado, devuelvo false.
        if (!isset($_SESSION['logueado']))
            return false;
            
        if (!$_SESSION['logueado'])
            return false;
            
        // Si ha expirado el tiempo, destruyo la sesión.
        if (time() - $_SESSION['loggedstart'] > (15 * 60))
        {
            // Aquí deberíamos destruir sólo nuestras variables sesión.
            session_unset();
            session_destroy();
            
            return false;
        } 
        
        // En caso de cumplirse el logueo, recargo el tiempo. 
        $_SESSION['loggedstart'] = time();
        
        // Logueo OK!!!
        return true;
    }
}
?>