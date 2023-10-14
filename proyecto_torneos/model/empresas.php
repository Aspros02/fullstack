<?php
require_once("bd.php");
class EmpresasModelo extends BD
{
    // Campos de la tabla.
    public $id;
    public $nombre;
    public $descripcion;
    public $foto_url = '';
    public $foto_nombre = '';

    public function Insertar()
    {
        $sql = "INSERT INTO empresas VALUES".
               " (default, '$this->nombre', '$this->descripcion', '$this->foto_url', '$this->foto_nombre')";
        
        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE empresas SET" .
               " nombre='$this->nombre', descripcion='$this->descripcion'";
            
        if ($this->foto_nombre != '')
            $sql .= ", foto_url='$this->foto_url', foto_nombre='$this->foto_nombre'";
                  
        $sql .= " WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM empresas WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = 'SELECT * FROM empresas';
        
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
            $this->descripcion = $this->filas[0]->descripcion;
            $this->foto_url = $this->filas[0]->foto_url;
            $this->foto_nombre = $this->filas[0]->foto_nombre;
        }
        return true;
    }
}
?>