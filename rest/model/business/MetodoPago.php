<?php
/**
 * Método de pago
 */
enum MetodoPago: string
{
    case EFECTIVO = 'efectivo';
    case TARJETA = 'tarjeta';
}