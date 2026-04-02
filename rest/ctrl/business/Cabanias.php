<?php

/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona las cabañas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Cabanias extends Request
{
    /**
     * Datos de la tabla "cabania"
     *
     * @var string
     */
    const NAME_TABLE = "cabania";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$queryInsert = INSERT_CABANIA;
        parent::$queryUpdate = UPDATE_CABANIA;
        parent::$queryDelete = DELETE_CABANIA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->capacidad);
        $statement->bindParam(3, $object->precio_por_persona);
        $statement->bindParam(4, $object->estado);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->capacidad);
        $statement->bindParam(3, $object->precio_por_persona);
        $statement->bindParam(4, $object->estado);
        $statement->bindParam(5, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}