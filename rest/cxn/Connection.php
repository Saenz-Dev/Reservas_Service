<?php
require_once 'LoginMysql.php';

/**
 * <b>Descripcion:</b> Clase que <br/> gestiona la conexion a la base de datos mysql
 * usada como un wrapper de PDO
 * <b>Caso de Uso:</b> PANTHER-Seguridad <br/>
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Connection
{

    /**
     * Instancia Única de clase
     */
    private static $db = null;

    /**
     * Instancia de clase PDO
     */
    private static $pdo;

    /**
     * Constructor de la clase
     */
    final private function __construct()
    {
        try {
            // Crear nueva conexión PDO
            self::getConnection();
        } catch (PDOException $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    /**
     * Garantiza tener una única instancia de la clase
     *
     * @return Connection|null
     */
    public static function getInstance()
    {
        if (self::$db === null) {
            self::$db = new self();
        }
        return self::$db;
    }

    /**
     * Crear una nueva conexión PDO basada
     * en las constantes de conexión
     *
     * @return PDO Objeto PDO
     */
    public function getConnection()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO('mysql:dbname=' . DATA_BASE . ';host=' . HOST_NAME . ":3013" . ";", USER, PASSWORD, array(
                // self::$pdo = new PDO('mysql:dbname=' . DATA_BASE . ';host=' . HOST_NAME . ";", USER, PASSWORD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
            ));
            // Habilitar excepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

    /**
     * Evita la clonación del objeto
     */
    final protected function __clone()
    {
    }

    /**
     * Elimina el objeto de la memoria
     */
    function _destructor()
    {
        self::$pdo = null;
    }
}
?>