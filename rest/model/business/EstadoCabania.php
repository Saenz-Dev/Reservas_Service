<?php
/**
 * Estado de la cabaña
 */
enum EstadoCabania: string
{
    case DISPONIBLE = 'disponible';
    case OCUPADA = 'ocupada';
    case MANTENIMIENTO = 'mantenimiento';
}