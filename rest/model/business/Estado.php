<?php

/**
 * <b>Descripcion:</b> Clase que <br/>contiene los estados de los usuarios
 * <b>Caso de Uso:</b> PANTHER-Seguridad <br/>
 *
 * @author Josué Nicolás Pinzón Villamil <a href = "mailto:jpinzon@j4sysol.com">jpinzon@j4sysol.com</a>
 */

enum Estado: int {
    case ACTIVO = 1;
    case INACTIVO = 0;
}