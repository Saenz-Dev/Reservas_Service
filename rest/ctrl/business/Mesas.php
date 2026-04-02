<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las mesas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Mesas extends Request
{
    /**
     * Datos de la tabla "cabania"
     *
     * @var string
     */
    const NAME_TABLE = "mesa";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_MESA;
        parent::$queryInsert = INSERT_MESA;
        parent::$queryUpdate = UPDATE_MESA;
        parent::$queryDelete = DELETE_MESA;
    }

    public function selectParameter($object, $statement) {
        $statement->bindParam(1, $object->id);
    }


    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->numero);
        $statement->bindParam(2, $object->capacidad);
        $statement->bindParam(3, $object->estado);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->numero);
        $statement->bindParam(2, $object->capacidad);
        $statement->bindParam(3, $object->estado);
        $statement->bindParam(4, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}