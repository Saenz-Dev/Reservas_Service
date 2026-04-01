<?php
/**
 * Estado de la mesa
 */
enum EstadoMesa: string
{
    case DISPONIBLE = 'disponible';
    case OCUPADA = 'ocupada';
    case RESERVADA = 'reservada';
}