<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los categorias de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Categorias extends Request
{
    const NAME_TABLE = "categoria";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_CATEGORIA;
        parent::$queryInsert = INSERT_CATEGORIA;
        parent::$queryUpdate = UPDATE_CATEGORIA;
        parent::$queryDelete = DELETE_CATEGORIA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->descripcion);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->nombre);
        $statement->bindParam(2, $object->descripcion);
        $statement->bindParam(3, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}