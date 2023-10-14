<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("config.php");
require_once("controller/empresas.php");
require_once("controller/torneos.php");
require_once("controller/juegos.php");
require_once("controller/app.php");
require_once("controller/usuarios.php");
require_once("controller/nosotros.php");
require_once("controller/compania.php");
require_once("controller/contacto.php");
require_once("controller/noticias.php");
require_once("controller/formularios.php");
require_once("controller/cookies.php");

require_once("controller/login.php");
require_once("controller/salir.php");


if(isset($_GET['c'])) :
    $controlador = $_GET['c'];

    $metodo = '';

    if(isset($_GET['m'])):
        $metodo = $_GET['m'];
    endif;
    
    switch ($controlador) :
        case 'empresas' :
            if (method_exists('EmpresasControlador', $metodo)):
                EmpresasControlador::{$metodo}();
            else :
                EmpresasControlador::index();
            endif; 
            break;
        
        case 'torneos' :
            if (method_exists('TorneosControlador', $metodo)):
                TorneosControlador::{$metodo}();
            else :
                TorneosControlador::index();
            endif; 
            break; 

        case 'juegos' :
            if (method_exists('JuegosControlador', $metodo)):
                JuegosControlador::{$metodo}();
            else :
                JuegosControlador::index();
            endif; 
            break;

        case 'usuarios' :
            if (method_exists('UsuariosControlador', $metodo)):
                UsuariosControlador::{$metodo}();
            else :
                UsuariosControlador::index();
            endif; 
            break;

        case 'nosotros' :
            if (method_exists('NosotrosControlador', $metodo)):
                NosotrosControlador::{$metodo}();
            else :
                NosotrosControlador::index();
            endif; 
            break;

        case 'compania' :
            if (method_exists('CompaniaControlador', $metodo)):
                CompaniaControlador::{$metodo}();
            else :
                CompaniaControlador::index();
            endif; 
            break;

        case 'contacto' :
            if (method_exists('ContactoControlador', $metodo)):
                ContactoControlador::{$metodo}();
            else :
                ContactoControlador::index();
            endif; 
            break;
            
        case 'noticias' :
            if (method_exists('NoticiasControlador', $metodo)):
                NoticiasControlador::{$metodo}();
            else :
                NoticiasControlador::index();
            endif; 
            break;

        case 'cookies' :
            if (method_exists('CookiesControlador', $metodo)):
                CookiesControlador::{$metodo}();
            else :
                CookiesControlador::index();
            endif; 
            break;

        case 'formularios' :
            if (method_exists('FormulariosControlador', $metodo)):
                FormulariosControlador::{$metodo}();
            else :
                AppControlador::index();
            endif; 
            break;

        case 'app' :
            if (method_exists('AppControlador', $metodo)):
                AppControlador::{$metodo}();
            else :
                AppControlador::index();
            endif; 
            break;

        case 'login' :
            if (method_exists('LoginControlador', $metodo)):
                LoginControlador::{$metodo}();
            else :
                AppControlador::index();
            endif; 
            break;

        case 'salir' :
            if (method_exists('SalirControlador', $metodo)):
                SalirControlador::Salir();
            endif; 
            break;
    endswitch;
else :
    AppControlador::index();
endif;
?>