<?php
/**
 * Estado de factura
 */
enum EstadoFactura: string
{
    case PAGA = 'paga';
    case PENDIENTE = 'pendiente';
}