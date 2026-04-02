<?php
/**
 * <b>Descripcion:</b> Clase que <br/>Gestiona los climas en las fechas de tareas
 *
 * @author Miguel Angel Saenz Tibambre<a href = "mailto:miguel.saenz02@uptc.edu.co">miguel.saenz02@uptc.edu.co</a>
 */
class Climas_Info extends Request
{
    const NAME_TABLE = "clima_info";

    public function init()
    {
        parent::$nameTable = self::NAME_TABLE;
        parent::$querySelect = SELECT_CLIMA;
        parent::$queryInsert = INSERT_CLIMA;
        parent::$queryUpdate = UPDATE_CLIMA;
        parent::$queryDelete = DELETE_CLIMA;
    }

    public function selectParameter($object, $statement)
    {
        $statement->bindParam(1, $object->id);
    }

    public function insertParameter($object, $statement)
    {
        $statement->bindParam(1, $object->descripcion);
        $statement->bindParam(2, $object->fecha);
        $statement->bindParam(3, $object->id_tarea);
    }

    public function updateParameter($object, $statement, $id)
    {
        $statement->bindParam(1, $object->descripcion);
        $statement->bindParam(2, $object->fecha);
        $statement->bindParam(3, $object->id_tarea);
        $statement->bindParam(4, $id);
    }

    public function deleteParameter($statement, $object)
    {
        $statement->bindParam(1, $object->id);
    }
}