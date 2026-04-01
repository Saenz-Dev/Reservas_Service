<?php
/**
 * Clase que modela un Pago
 */
class Pago
{

    /** @var int */
    public $id_pago;

    /** @var string */
    public $fecha;

    /** @var int */
    public $monto;

    /** @var MetodoPago */
    public $metodo;

    /** @var int */
    public $id_factura;

    public function getIdPago()
    {
        return $this->id_pago;
    }
    public function getMetodo()
    {
        return $this->metodo;
    }

    public function setIdPago($id)
    {
        $this->id_pago = $id;
    }
    public function setMetodo(MetodoPago $metodo)
    {
        $this->metodo = $metodo;
    }
}