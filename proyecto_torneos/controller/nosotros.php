<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

class NosotrosControlador
{
    static function index()
    {
        require_once("view/nosotros.php");
    }

}
?>