<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

class ContactoControlador
{
    static function index()
    {
        require_once("view/contacto.php");
    }

}
?>