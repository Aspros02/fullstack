<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

class CompaniaControlador
{
    static function index()
    {
        require_once("view/compania.php");
    }

}
?>