<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/torneos.php");
require_once("model/juegos.php");
require_once("model/empresas.php");
require_once("model/categorias.php");

class AppControlador
{
    static function index()
    {
        $empresas = new EmpresasModelo();
        $empresas->Seleccionar();

        $torneos = new TorneosModelo();
        $torneos->Seleccionar();

        $juegos = new JuegosModelo();
        $juegos->Seleccionar();

        $categorias = new CategoriasModelo();
        $categorias->Seleccionar();
        
        require_once("view/app.php");
    }
}
?>