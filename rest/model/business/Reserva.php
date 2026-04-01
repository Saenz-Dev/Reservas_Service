<?php
/**
 * Clase que modela una Reserva
 */
class Reserva
{

    /** @var int */
    public $id_reserva;

    /** @var string */
    public $fecha_hora_inicio;

    /** @var string */
    public $fecha_hora_fin;

    /** @var int */
    public $id_cliente;

    /** @var Estado */
    public $estado;

    /** @var int */
    public $cantidad_personas;

    /**
     * @var Cabania[]
     */
    public $cabanias = [];

    /**
     * @var Mesa[]
     */

    public $mesas = [];

    public function getIdReserva()
    {
        return $this->id_reserva;
    }
    public function getFechaInicio()
    {
        return $this->fecha_hora_inicio;
    }
    public function getFechaFin()
    {
        return $this->fecha_hora_fin;
    }
    public function getIdCliente()
    {
        return $this->id_cliente;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getCantidadPersonas()
    {
        return $this->cantidad_personas;
    }

    public function setIdReserva($id)
    {
        $this->id_reserva = $id;
    }
    public function setFechaInicio($fecha)
    {
        $this->fecha_hora_inicio = $fecha;
    }
    public function setFechaFin($fecha)
    {
        $this->fecha_hora_fin = $fecha;
    }
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }
    public function setEstado(Estado $estado)
    {
        $this->estado = $estado;
    }
    public function setCantidadPersonas($cantidad)
    {
        $this->cantidad_personas = $cantidad;
    }


    /**
     * @return Mesa[]
     */
    public function getMesas()
    {
        return $this->mesas;
    }

    /**
     * @param Mesa[] $mesas
     */
    public function setMesas(array $mesas)
    {
        $this->mesas = $mesas;
    }

    /**
     * @param Mesa $mesa
     */
    public function addMesa(Mesa $mesa)
    {
        $this->mesas[] = $mesa;
    }

    /**
     * @return Cabania[]
     */
    public function getCabanias()
    {
        return $this->cabanias;
    }

    /**
     * @param Mesa[] $mesas
     */
    public function setCabanias(array $cabanias)
    {
        $this->cabanias = $cabanias;
    }

    /**
     * @param Mesa $mesa
     */
    public function addCabania(Mesa $cabania)
    {
        $this->cabanias[] = $cabania;
    }
}