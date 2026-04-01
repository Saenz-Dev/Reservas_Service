<?php
/**
 * Clase que modela una Factura
 */
class Factura
{

    /** @var int */
    public $id_factura;

    /** @var int */
    public $numero_factura;

    /** @var string */
    public $fecha_emision;

    /** @var int */
    public $subtotal;

    /** @var int */
    public $impuestos;

    /** @var EstadoFactura */
    public $estado;

    /** @var int */
    public $id_reserva;

    /** @var int */
    public $total;

    public function getIdFactura()
    {
        return $this->id_factura;
    }
    public function getNumeroFactura()
    {
        return $this->numero_factura;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setIdFactura($id)
    {
        $this->id_factura = $id;
    }
    public function setNumeroFactura($num)
    {
        $this->numero_factura = $num;
    }
    public function setEstado(EstadoFactura $estado)
    {
        $this->estado = $estado;
    }
}