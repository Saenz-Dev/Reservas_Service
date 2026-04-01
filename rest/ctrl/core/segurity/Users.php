<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los usuarios de la aplicación
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Users extends Request
{

    /**
     * Datos de la tabla "usuario"
     *
     * @var string
     */
    const NAME_TABLE = "j4user";

    /**
     *
     * {@inheritdoc}
     * @see Request::init()
     */
    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$queryInsert = INSERT_USER;
        parent::$queryUpdate = UPDATE_USER;
    }

    /**
     *
     * {@inheritdoc}
     * @see Request::insertParameter()
     */
    public function insertParameter($object, $statement)
    {
        $encryptPassword = UtilAuth::encrytPassword($object->password);
        $keyApi = UtilAuth::getKeyAPI();
        
        $statement->bindParam(1, $object->user);
        $statement->bindParam(2, $encryptPassword);
        $statement->bindParam(3, $keyApi);
        $statement->bindParam(4, $object->roles);
    }

    /**
     *
     * {@inheritdoc}
     * @see Request::updateParameter()
     */
    public function updateParameter($object, $statement, $id)
    {
        $encryptPassword = UtilAuth::encrytPassword($object->password);
        $keyApi = UtilAuth::getKeyAPI();
        $statement->bindParam(1, $encryptPassword);
        $statement->bindParam(2, $keyApi);
        $statement->bindParam(3, $object->roles);
        $statement->bindParam(4, $id);
    }
}
?>