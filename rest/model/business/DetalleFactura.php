<?php
/**
 * Clase que modela el detalle de una factura
 */
class DetalleFactura
{

    /**
     * @var int ID del detalle
     */
    public $id_detalle;

    /**
     * @var int ID de la factura
     */
    public $id_factura;

    /**
     * @var string Descripción del servicio/producto
     */
    public $descripcion;

    /**
     * @var int Cantidad
     */
    public $cantidad;

    /**
     * @var float Precio unitario
     */
    public $precio_unitario;

    /**
     * @var float Subtotal
     */
    public $subtotal;

    // GETTERS

    public function getIdDetalle()
    {
        return $this->id_detalle;
    }
    public function getIdFactura()
    {
        return $this->id_factura;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getPrecioUnitario()
    {
        return $this->precio_unitario;
    }
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    // SETTERS

    public function setIdDetalle($id)
    {
        $this->id_detalle = $id;
    }
    public function setIdFactura($id_factura)
    {
        $this->id_factura = $id_factura;
    }
    public function setDescripcion($desc)
    {
        $this->descripcion = $desc;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setPrecioUnitario($precio)
    {
        $this->precio_unitario = $precio;
    }
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }
}