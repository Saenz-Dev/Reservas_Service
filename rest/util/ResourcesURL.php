<?php
/**<b>Descripcion:</b> Clase que <br/> Contiene las constantes para acceso a servicios restFul
 
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */

/**
 * Recursos existentes para servicios restFul
 */
define("RESOURCES_URL", array(
    'usuarios',
    'roles',
    'clientes',
    'cuentas',
    'cabanias',
    'mesas',
    'reservas',
    'reservas_cabania',
    'reservas_mesa',
    'facturas',
    'clientes',
    'detalles_facturas',
    'pagos',

    'categorias',
    'climas_info',
    'notificaciones',
    'tareas',
    'usuarios_tareas',


    

    // 'useraction',
    //Business
    // 'login',
    // 'persons', 
    // 'pets'
));

/**
 * Cabecera de autenticación del token
 */
define("AUTHORIZATION", "Authorization");

/**
 * Nombre del metodo que permite cargar el nombre de la tabla
 */
define("INIT_TABLE", "init");
?>
