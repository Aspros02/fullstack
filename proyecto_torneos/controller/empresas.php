<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/empresas.php");

class EmpresasControlador
{
    static function index()
    {
        $empresas = new EmpresasModelo();
        $empresas->Seleccionar();

        require_once("view/empresas.php");
    }

    static function Nuevo()
    {
        $opcion = 'NUEVO'; // Opción de insertar una empresa.
        require_once("view/empresasmantenimiento.php");
    }

    static function Insertar()
    {
        $empresa = new EmpresasModelo();

        $empresa->nombre = $_POST['nombre'];
        $empresa->descripcion = $_POST['descripcion'];
        $empresa->foto_url = self::SubirFoto($empresa->id);
        $empresa->foto_nombre = $_FILES["foto"]["name"];
        
        if ($empresa->Insertar() == 1)
        header("location:" . URLSITE . '?c=empresas');
    else 
    {
        $_SESSION["CRUDMVC_ERROR"] = $empresa->GetError();
        header("location:" . URLSITE . "view/error.php");
    }
    }

    static function Editar()
    {
        $empresa = new EmpresasModelo();

        $empresa->id = $_GET['id'];

        $opcion = 'EDITAR'; // Opción de modificar una empresa.

        if ($empresa->seleccionar())
            require_once("view/empresasmantenimiento.php");
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $empresa->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $empresa = new EmpresasModelo();

        $empresa->id = $_GET['id'];
        $empresa->nombre = $_POST['nombre'];
        $empresa->descripcion = $_POST['descripcion'];

        // Si me has subido una foto, ...
        if ($_FILES["foto"]["name"] != '')
        {
            // El nombre de la foto.
            $empresa->foto_nombre = $_FILES["foto"]["name"];

            // La url donde se guarda la foto "imagenes/..."
            $empresa->foto_url = self::SubirFoto($empresa->id);

            // Si hay un error al subir la foto, 
            if ($empresa->foto_url === false)
            {
                header("location:" . URLSITE . "view/error.php");
                return;
            }
        }
        // Aquí hay que tener cuidado, en el caso de que se pulse el botón de aceptar
        // pero no se haya modificado nada, la función modificar devolverá un cero,
        // por eso hay que comprobar que no hay error.
        if (($empresa->Modificar() == 1) || ($empresa->GetError() == ''))
            header("location:" . URLSITE . '?c=empresas');
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $empresa->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $empresa = new EmpresasModelo();
        $empresa->id = $_GET['id'];

        if ($empresa->Borrar() == 1)
            header("location:" . URLSITE . '?c=empresas');
        else 
        {
            $_SESSION["CRUDMVC_ERROR"] = $empresa->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // Es privada porque solo queremos acceder desde esta clase.
    private static function SubirFoto($id)
    {
        $carpetaDestino = 'C:\\xampp\\htdocs\\proyectofinal\\imagenes\\';
        $nombreFoto = $id . '-' . basename($_FILES["foto"]["name"]);
        $ficheroDestino = $carpetaDestino . $nombreFoto;
        $tipoImagen = strtolower(pathinfo($ficheroDestino, PATHINFO_EXTENSION));
        $foto_url = URLSITE.'imagenes/'.$nombreFoto;

        // Comprobamos que el fichero es una imagen.
        $esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($esImagen === false)
        {
            $_SESSION["CRUDMVC_ERROR"] = "Al subir la foto.<br>" .
                                         "No es un foto correcta.<br>" .
                                         "Logo no modificado.";
            return false; 
        }

        // Chequeamos el tamaño máximo permitido.
        if ($_FILES["foto"]["size"] > 524288)
        {
            $_SESSION["CRUDMVC_ERROR"] = "Al subir la foto.<br>".
                                         "El tamaño excede los 500 Kb.<br>".
                                         "Logo no modificado.";
            return false;
        }

        // Sólo permitimos estos formatos.
        if ($tipoImagen != 'jpg' &&  $tipoImagen != 'png')
        {
            $_SESSION["CRUDMVC_ERROR"] = "Al subir la foto.<br>".
                                         "Formato incorrecto.<br>" . 
                                         "Logo no modificado.";
            return false;
        }

        // Movemos la imagen de la carpeta temporal a la carpeta definitiva
        if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $ficheroDestino))
        {
            $_SESSION["CRUDMVC_ERROR"] = "Al subir la foto.<br>". 
                                         "No se ha podido guardar.<br>". 
                                         "Logo no modificado.";
            return false;
        }

        return $foto_url;
    }
}
?>