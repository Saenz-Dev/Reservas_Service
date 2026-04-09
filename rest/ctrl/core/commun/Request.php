<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las solicitudes tipo CRUD de un elemento
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
abstract class Request
{

    /**
     * Nombre de la tabla del negocio
     *
     * @var string
     */
    protected static $nameTable = "table";

    /**
     * Comando para consultar en base de datos
     *
     * @var string
     */
    protected static $querySelect = "select";

    /**
     * Comando para insertar en base de datos
     *
     * @var string
     */
    protected static $queryInsert = "insert";

    /**
     * Comando para insertar en base de datos
     *
     * @var string
     */
    protected static $queryUpdate = "update";

    /**
     * Comando para borrar en base de datos
     *
     * @var string
     */
    protected static $queryDelete = "delete";

    /**
     * Función que permite insertar dinamicamente el nombre de la tabla
     */
    abstract function init();

    /**
     * Inserta los parametros en el statement y realiza
     * validaciones previas antes de insertar
     *
     * @param unknown $object
     *            Objeto insertar o actualizar
     * @param PDOStatement $statement
     *            Sentencia para ejecutar en base de datos
     */
    abstract function selectParameter($object, $statement);

    /**
     * Inserta los parametros en el statement y realiza
     * validaciones previas antes de insertar
     *
     * @param unknown $object
     *            Objeto insertar o actualizar
     * @param PDOStatement $statement
     *            Sentencia para ejecutar en base de datos
     */
    abstract function insertParameter($object, $statement);

    /**
     * Inserta los parametros en el statement y realiza
     * validaciones previas antes de insertar
     *
     * @param unknown $object
     *            Objeto insertar o actualizar
     * @param unknown $statement
     *            Sentencia para ejecutar en base de datos
     */
    abstract function updateParameter($object, $statement, $id);

    /**
     * Inserta los parametros en el statement y realiza
     * validaciones previas antes de insertar
     *
     * @param unknown $object
     *            Objeto insertar o actualizar
     * @param unknown $statement
     *            Sentencia para ejecutar en base de datos
     */
    abstract function deleteParameter($statement, $id);

    /**
     * Método que invoca a las funciones tipo get
     *
     * @param unknown $request
     * @return ContentBody
     */
    public static function get($request)
    {
        // print_r($request);
        $request = explode('/', $_GET['PATH_INFO']);
        // echo "resource: $request[0]", PHP_EOL, "method: get", PHP_EOL;
        if ($request[0] != "usuarios_tareas" ) {
            Authenticator::authenticator();
        }
        $request = $_GET['id'] ?? null;
        
        // $otro = JSONUtil::decodeJSON();
        // print_r($request);
        if (empty($request)) {
            return self::getRequest(null);
        } else {
            return self::getRequest($request);
        }
    }

    /**
     * Método que invoca a las funciones tipo get
     *
     * @param unknown $request
     * @return ContentBody
     */
    public static function post($request)
    {
        if ($request[0] != "usuarios_tareas") {
            Authenticator::authenticator();
        }
        $body = \JSONUtil::decodeJSON();
        ValidacionDatos::validarDatos($request, $body);
        self::createRequest($body);
        $bodyAnswer = new ContentBody(CREATE, ST201, sucessful);
        return $bodyAnswer;
    }

    /**
     * Método que invoca a las funciones tipo put
     *
     * @param unknown $request
     * @throws ExcepcionApi
     * @return ContentBody
     */
    public static function put($request)
    {
        Authenticator::authenticator();
        $body = \JSONUtil::decodeJSON();
        ValidacionDatos::validarDatos($request, $body);
        // print_r($body);
        $tempo = self::updateRequest($body, $body->id);

        if ($tempo > 0) {
            return $bodyAnswer = new ContentBody(OK, ST200, sucessful);
        } else {
            throw new ExcepcionApi(NO_CONTENT, ST204, error_notExist);
        }
    }

    public static function delete($request)
    {
        Authenticator::authenticator();
        $object = \JSONUtil::decodeJSON();
        self::deleteRequest($object);
        return $bodyAnswer = new ContentBody(OK, ST200, sucessful);
    }

    /**
     * Ejecuta las peticiones tipo get, obteniendo
     *
     * @param unknown $id
     * @throws ExcepcionApi
     * @return ContentBody
     */
    private static function getRequest($object)
    {
        try {
            if (empty($object)) {
                // print_r($object);
                // echo 'Entra al if\n';
                $query = "SELECT * FROM " . self::$nameTable;
                // Preparar sentencia
                // echo 'Entra a getRequest';
                $statement = Connection::getInstance()->getConnection()->prepare($query);
            } else {
                $pdo = Connection::getInstance()->getConnection();
                $query = self::$querySelect;
                // Preparar la statement
                $statement = $pdo->prepare($query);
                $instance = new static();
                $instance->selectParameter($object, $statement);

                // // echo 'Entra a getRequest';
                // $query = "SELECT * FROM " . self::$nameTable . " WHERE id=?";
                // // Preparar statement
                // $statement = Connection::getInstance()->getConnection()->prepare($query);
                // // Ligar id
                // $statement->bindParam(1, $object->id, PDO::PARAM_INT);
            }

            // Ejecutar sentencia preparada
            // print_r($id);
            $statement->execute();
            $tempo = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (count($tempo) > 0) {
                $bodyAnswer = new ContentBody(OK, ST200, $tempo);
                return $bodyAnswer;
            } else {
                throw new ExcepcionApi(NO_CONTENT, ST204, no_result);
            }
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    /**
     *
     * @param unknown $object
     * @throws ExcepcionApi
     * @return string
     */
    private static function createRequest($object)
    {
        try {
            $pdo = Connection::getInstance()->getConnection();
            // statement INSERT
            $query = self::$queryInsert;
            // Preparar la statement
            $statement = $pdo->prepare($query);
            $instance = new static();
            $instance->insertParameter($object, $statement);
            $statement->execute();
            // Retornar en el útimo id insertado
            return $pdo->lastInsertId();
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    /**
     * Actualiza un recurso según su id
     *
     * @param float $id
     * @param unknown $object
     * @throws ExcepcionApi Lanza una excepcion si hay un error en la actualización
     * @return number Número de columna actualizada.
     */
    private static function updateRequest($object, $id)
    {
        try {
            // Creando consulta UPDATE
            $query = self::$queryUpdate;
            // Preparar la sentencia
            $statement = Connection::getInstance()->getConnection()->prepare($query);
            $instance = new static();
            $instance->updateParameter($object, $statement, $id);
            // Ejecutar la sentencia
            $statement->execute();

            return $statement->rowCount();
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }

    /**
     * Método para eliminar un elemento de forma suave
     *
     * @param unknown $id
     *            del elemento
     * @throws ExcepcionApi Lanza un error si hay problemas en la conexion
     * @return number Numero de filas Afeactadas
     */
    private static function deleteRequest($object)
    {
        try {
            // date_default_timezone_set('America/Bogota');
            if (empty($object->id)) {
                $query = self::$queryDelete;
                // Preparar sentencia
                $statement = Connection::getInstance()->getConnection()->prepare($query);
                $instance = new static();
                $instance->deleteParameter($statement, $object);
                // $dateDelete = date('Y-m-d H:i:s');
                // $statement->bindParam(1, $dateDelete, PDO::PARAM_STR);
            } else {
                $query = self::$queryDelete;
                // Preparar statement
                $statement = Connection::getInstance()->getConnection()->prepare($query);
                $instance = new static();
                $instance->deleteParameter($statement, $object);
                // $dateDelete = date('Y-m-d H:i:s');
                // $statement->bindParam(1, $dateDelete, PDO::PARAM_STR);
                // $statement->bindParam(2, $object, PDO::PARAM_INT);
            }

            $statement->execute();

            return $statement->rowCount();
        } catch (Exception $e) {
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, $e->getMessage());
        }
    }
}

