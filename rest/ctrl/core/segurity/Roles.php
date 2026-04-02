<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los roles de la aplicación
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Roles extends Request
{

    /**
     * Datos de la tabla "roles"
     * 
     * @var string
     */
    const NAME_TABLE = "rol";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$queryInsert = INSERT_ROL;
        parent::$queryUpdate = UPDATE_ROL;
        parent::$queryDelete = DELETE_ROL;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    /**
     * {@inheritDoc}
     * @see Request::updateParameter()
     */
    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->description);
        $statement->bindParam(3, $id);
    }

    /**
     * {@inheritDoc}
     * @see Request::insertParameter()
     */
    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->description);
    }

    /**
     * {@inheritDoc}
     * @see Request::deleteParameter()
     */
    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}
?>

