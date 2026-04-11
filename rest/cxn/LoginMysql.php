<?php
/**<b>Descripcion:</b> Clase que <br/> Contiene los datos de conexión a base de datos
 * <b>Caso de Uso:</b> Seguridad <br/>
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */

/**
 * Provee las constantes del nombre del host para conectarse a la base de datos
 */
// define("HOST_NAME", "localhost");
define("HOST_NAME", "mysql-task-manager.alwaysdata.net");
// define("HOST_NAME", "mysql-panther.alwaysdata.net");
/**
 * Provee las constantes del nombre de base de datos
 */
define("DATA_BASE", "task-manager_database"); //para tareas
// define("DATA_BASE", "reservas"); //para reservas
// define("DATA_BASE", "tareas"); //para tareas
/**
 * Provee las constantes de usuario para conectarse a la base de datos
 */
define("USER", "task-manager");
// define("USER", "root");
// define("USER", "panther");
/**
 * Provee las constantes de contraseña para conectarse a la base de datos
 */
define("PASSWORD", "Niosaenz123");
// define("PASSWORD", "");
// define("PASSWORD", "Panther.343");
?>
