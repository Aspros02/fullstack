<?php
require_once("bd.php");
class CategoriasModelo extends BD
{
    // Campos de la tabla.
    public $id;
    public $nombre;

    public function Insertar()
    {
        $sql = "INSERT INTO categorias VALUES".
               " (default, '$this->nombre')";
        
        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE categorias SET" .
               " nombre='$this->nombre'" .
               " WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM categorias WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = 'SELECT * FROM categorias';
        
        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id != 0)
            $sql .= " WHERE id=$this->id";
    
        $this->filas = $this->_consultar($sql);
        
        if ($this->filas == null)
            return false;
        
        if ($this->id != 0)
        {
            // Guardamos los campos en las propiedades.
            $this->nombre = $this->filas[0]->nombre;
        }
        return true;
    }
}
?>