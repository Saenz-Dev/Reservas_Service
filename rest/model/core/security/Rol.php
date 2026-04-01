<?php
/**
 * Clase que modela un Rol en el sistema
 */
class Rol
{

    /** @var int */
    public $id_rol;

    /** @var string */
    public $nombre;

    /** @var string */
    public $description;

    public function getIdRol()
    {
        return $this->id_rol;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
}