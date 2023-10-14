<?php
require_once("bd.php");
class FormulariosModelo extends BD
{
    // Campos de la tabla.
    public $id;
    public $nombre_torneo;
    public $empresa;
    public $juego;
    public $fecha;
    public $nick;
    public $codigo;
    public $id_torneo;

    public function Insertar()
    {
        $sql = "INSERT INTO formularios VALUES".
               " (default, '$this->nombre_torneo', $this->empresa, $this->juego, '$this->fecha', '$this->nick', '$this->codigo', $this->id_torneo)";
        
        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = 'SELECT * FROM formularios';
        
        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id != 0)
            $sql .= " WHERE id=$this->id";
    
        $this->filas = $this->_consultar($sql);
        
        if ($this->filas == null)
            return false;
        
        if ($this->id != 0)
        {
            // Guardamos los campos en las propiedades.
            $this->nombre_torneo = $this->filas[0]->nombre_torneo;
            $this->empresa = $this->filas[0]->empresa;
            $this->juego = $this->filas[0]->juego;
            $this->fecha = $this->filas[0]->fecha;
            $this->nick = $this->filas[0]->nick;
            $this->codigo = $this->filas[0]->codigo;
            $this->id_torneo = $this->filas[0]->id_torneo;
        }
        return true;
    }

    public function UltimoID(){

        $id = $this->_ultimoId();

        return $id;
    }

    public function SeleccionarTorneo()
    {
        $sql = 'SELECT * FROM formularios';
        
        // Si me han pasado un id, obtenemos solo el registro indicado.
        if ($this->id_torneo != 0)
            $sql .= " WHERE id_torneo=$this->id_torneo";
    
        $this->filas = $this->_consultar($sql);
        
        if ($this->filas == null)
            return false;
        
        if ($this->id != 0)
        {
            // Guardamos los campos en las propiedades.
            $this->nombre_torneo = $this->filas[0]->nombre_torneo;
            $this->empresa = $this->filas[0]->empresa;
            $this->juego = $this->filas[0]->juego;
            $this->fecha = $this->filas[0]->fecha;
            $this->nick = $this->filas[0]->nick;
            $this->codigo = $this->filas[0]->codigo;
            $this->id_torneo = $this->filas[0]->id_torneo;
        }
        return true;
    }
}
?>