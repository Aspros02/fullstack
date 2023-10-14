<?php
require_once("bd.php");
class TorneosModelo extends BD
{
    // Campos de la tabla.
    public $id;
    public $id_empresa;
    public $id_juego;
    public $nombre;
    public $fecha;

    public function Insertar()
    {
        $sql = "INSERT INTO torneos VALUES".
               " (default, $this->id_empresa, $this->id_juego, '$this->nombre', '$this->fecha')";
        
        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE torneos SET" .
               " id_empresa=$this->id_empresa, id_juego=$this->id_juego, " .
               " nombre='$this->nombre', fecha='$this->fecha'" .
               " WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM torneos WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = 'SELECT *,' .
            ' (SELECT nombre FROM empresas WHERE empresas.id=torneos.id_empresa) AS empresa,' .
            ' (SELECT nombre FROM juegos WHERE juegos.id=torneos.id_juego) AS juego' .
            ' FROM torneos';
        
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
            $this->id_juego = $this->filas[0]->id_juego;
            $this->nombre = $this->filas[0]->nombre;
            $this->fecha = $this->filas[0]->fecha;
        }
        return true;
    }

    public function SeleccionarEmpresa()
    {
        $sql = 'SELECT *,' .
            ' (SELECT nombre FROM empresas WHERE empresas.id=torneos.id_empresa) AS empresa,' .
            ' (SELECT nombre FROM juegos WHERE juegos.id=torneos.id_juego) AS juego' .
            ' FROM torneos';

        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id_empresa != 0)
            $sql .= " WHERE id_empresa=$this->id_empresa";

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null)
            return false;

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades.
            $this->id_empresa = $this->filas[0]->id_empresa;
            $this->id_juego = $this->filas[0]->id_juego;
            $this->nombre = $this->filas[0]->nombre;
            $this->fecha = $this->filas[0]->fecha;
        }
        return true;
    }
}
?>