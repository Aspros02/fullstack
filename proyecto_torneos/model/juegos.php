<?php
require_once("bd.php");
class JuegosModelo extends BD
{
    // Campos de la tabla.
    public $id;
    public $id_empresa;
    public $nombre;
    public $id_categoria;

    public function Insertar()
    {
        $sql = "INSERT INTO juegos VALUES".
               " (default, $this->id_empresa, '$this->nombre', $this->id_categoria)";
        
        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE juegos SET" .
            " id_empresa=$this->id_empresa, nombre='$this->nombre', " .
            " id_categoria=$this->id_categoria" .
            " WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM juegos WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = 'SELECT *,' .
            ' (SELECT nombre FROM empresas WHERE empresas.id=juegos.id_empresa) AS empresa,' .
            ' (SELECT nombre FROM categorias WHERE categorias.id=juegos.id_categoria) AS categoria' .
            ' FROM juegos';
        
        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id != 0)
            $sql .= " WHERE id=$this->id";
    
        $this->filas = $this->_consultar($sql);
        
        if ($this->filas == null)
            return false;
        
        if ($this->id != 0)
        {
            // Guardamos los campos en las propiedades.
            $this->id_empresa = $this->filas[0]->id_empresa;
            $this->nombre = $this->filas[0]->nombre;
            $this->id_categoria = $this->filas[0]->id_categoria;
        }
        return true;
    }

    public function SeleccionarEmpresa()
    {
        $sql = 'SELECT *,' .
            ' (SELECT nombre FROM empresas WHERE empresas.id=juegos.id_empresa) AS empresa,' .
            ' (SELECT nombre FROM categorias WHERE categorias.id=juegos.id_categoria) AS categoria' .
            ' FROM juegos';

        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id_empresa != 0)
            $sql .= " WHERE id_empresa=$this->id_empresa";

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null)
            return false;

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades.
            $this->id_empresa = $this->filas[0]->id_empresa;
            $this->nombre = $this->filas[0]->nombre;
            $this->id_categoria = $this->filas[0]->id_categoria;
        }
        return true;
    }

    public function SeleccionarCategoria()
    {
        $sql = 'SELECT *,' .
            ' (SELECT nombre FROM empresas WHERE empresas.id=juegos.id_empresa) AS empresa,' .
            ' (SELECT nombre FROM categorias WHERE categorias.id=juegos.id_categoria) AS categoria' .
            ' FROM juegos';

        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id_empresa != 0)
            $sql .= " WHERE id_empresa=$this->id_empresa";

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null)
            return false;

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades.
            $this->id_empresa = $this->filas[0]->id_empresa;
            $this->nombre = $this->filas[0]->nombre;
            $this->id_categoria = $this->filas[0]->id_categoria;
        }
        return true;
    }

    public function SeleccionarParaTorneo()
    {
        $sql = 'SELECT * FROM juegos';

        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id_empresa != 0)
            $sql .= " WHERE id_empresa=$this->id_empresa";
    
        $this->filas = $this->_consultar($sql);
        
        if ($this->filas == null)
            return false;
        
        if ($this->id != 0)
        {
            // Guardamos los campos en las propiedades.
            $this->id_empresa = $this->filas[0]->id_empresa;
            $this->nombre = $this->filas[0]->nombre;
            $this->id_categoria = $this->filas[0]->id_categoria;
        }
        return true;
    }
}
?>