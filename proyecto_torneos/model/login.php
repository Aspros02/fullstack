<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once('bd.php');
require_once("model/usuarios.php");
require_once('controller/crypt.php');

class LoginModelo extends BD
{
    public $usuario;
    public $contrasena;
    public $admin;

    public function Loguearse()
    {
        $sql = "SELECT * FROM usuarios WHERE usuario='$this->usuario'";

        $this->filas = $this->_consultar($sql);

        if ($this->filas != null)
        {
            if (Crypt::Encriptar($this->contrasena) == $this->filas[0]->contrasena)
            {
                $_SESSION['usuario'] = $this->filas[0]->usuario;
                $_SESSION['nombre'] = $this->filas[0]->nombre;
                $_SESSION['admin'] = $this->filas[0]->admin;
                $_SESSION['logueado'] = true;
                $_SESSION['loggedstart'] = time();

                return true;
            }
            return false;
        }
        return false;
    }
}
?>