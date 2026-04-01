<?php
/**
 * Clase que modela una Cabaña
 */
class Cabania
{

    /**
     * @var int ID de la cabaña
     */
    public $id_cabania;

    /**
     * @var string Nombre de la cabaña
     */
    public $nombre;

    /**
     * @var int Capacidad de personas
     */
    public $capacidad;

    /**
     * @var float Precio por noche
     */
    public $precio_noche;

    /**
     * @var EstadoCabania Estado actual
     */
    public $estado;

    // 🔹 GETTERS

    /**
     * @return int|null
     */
    public function getIdCabania()
    {
        return $this->id_cabania;
    }

    /**
     * @return string|null
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return int|null
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * @return float|null
     */
    public function getPrecioNoche()
    {
        return $this->precio_noche;
    }

    /**
     * @return EstadoCabania|null
     */
    public function getEstado()
    {
        return $this->estado;
    }

    // 🔹 SETTERS

    /**
     * @param int $id
     */
    public function setIdCabania($id)
    {
        $this->id_cabania = $id;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param int $capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }

    /**
     * @param float $precio
     */
    public function setPrecioNoche($precio)
    {
        $this->precio_noche = $precio;
    }

    /**
     * @param EstadoCabania $estado
     */
    public function setEstado(EstadoCabania $estado)
    {
        $this->estado = $estado;
    }
}