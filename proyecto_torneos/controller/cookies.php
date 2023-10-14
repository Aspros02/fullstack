<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

class CookiesControlador
{
    static function index()
    {
        require_once("view/aviso-cookies.php");
    }

}
?>