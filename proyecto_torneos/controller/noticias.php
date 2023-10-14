<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

class NoticiasControlador
{
    static function index()
    {
        require_once("view/noticias.php");
    }

}
?>